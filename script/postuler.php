<?php
session_start();

require '../controllers/KeepInformationController.php'; 
require_once '../config/config.php';

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
$keepInformationController = new KeepInformationController($db);

if (isset($_POST['postuler'])) {
    // Récupérez les données postées (user_id et id_advertisement)
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
    $id_advertisement = isset($_POST['id_advertisement']) ? $_POST['id_advertisement'] : null;

    // Other form data
    $first_Name = isset($_POST['first_Name']) ? $_POST['first_Name'] : null;
    $last_Name = isset($_POST['last_Name']) ? $_POST['last_Name'] : null;
    $address = isset($_POST['address']) ? $_POST['address'] : null;
    $city = isset($_POST['city']) ? $_POST['city'] : null;
    $postal_Code = isset($_POST['postal_Code']) ? $_POST['postal_Code'] : null;
    $country = isset($_POST['country']) ? $_POST['country'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $phone_Number = isset($_POST['phone_Number']) ? $_POST['phone_Number'] : null;

    // Ajoutez les informations
    if ($user_id && $id_advertisement) {
        $keepInformationController->addInformation(
            $user_id, 
            $id_advertisement, 
            $first_Name, 
            $last_Name, 
            $address, 
            $city, 
            $postal_Code, 
            $country, 
            $email, 
            $phone_Number
        );
        echo "L'information a été ajoutée avec succès.";
    } else {
        echo "Erreur : les paramètres user_id et id_advertisement sont nécessaires.";
    }
}
