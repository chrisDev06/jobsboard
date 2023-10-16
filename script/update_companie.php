<?php 
require_once '../controllers/CompanieController.php';
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $companieController = new CompanieController($db);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zip_code = $_POST['zip_code'];
        $country = $_POST['country'];
        $id_companie = $_POST['id_companie'];

        $companieController->updateCompanie($name, $email, $number, $address, $city, $zip_code, $country, $id_companie);

        header('Location: ../views/admin_dashboard.php');
        exit();
    } catch (PDOException $e) {
        echo 'Echec' . $e->getMessage();
    }
}
?>