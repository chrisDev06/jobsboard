<?php
session_start();
require_once '../config/config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/log/login.php");
    exit();
}

// Récupérer les données du formulaire
$title = $_POST['title'];
$address = $_POST['address'];
$zip_code = $_POST['zip_code'];
$country = $_POST['country'];
$city = $_POST['city'];
$desc = $_POST['desc'];
$salary = $_POST['salary'];
$date = $_POST['date'];
$phone = $_POST['phone'];
$contact = $_POST['contact'];
$userId = $_SESSION['user_id'];

try {
    // Initialiser la connexion à la base de données
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer dynamiquement l'ID de l'entreprise associée à l'utilisateur
    $stmt = $db->prepare("
        SELECT id_companie 
        FROM companies 
        WHERE user_id = :user_id
    ");
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $companyId = $row['id_companie'];

    // Vérifiez si les champs obligatoires sont remplis
    if (empty($title) || empty($salary) || empty($companyId)) {
        echo "Veuillez remplir tous les champs obligatoires.";
        exit();
    }

    // Insérer l'annonce dans la base de données
    $stmt = $db->prepare("
        INSERT INTO advertisements (title, address, zip_code, country, city, `desc`, salary, date, phone, contact, company_id)
        VALUES (:title, :address, :zip_code, :country, :city, :desc, :salary, :date, :phone, :contact, :company_id)
    ");
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':zip_code', $zip_code, PDO::PARAM_STR);
    $stmt->bindParam(':country', $country, PDO::PARAM_STR);
    $stmt->bindParam(':city', $city, PDO::PARAM_STR);
    $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
    $stmt->bindParam(':salary', $salary, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':contact', $contact, PDO::PARAM_STR);
    $stmt->bindParam(':company_id', $companyId, PDO::PARAM_INT);
    $stmt->execute();

    echo "L'annonce a été créée avec succès.";

} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
?>
