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

// Ajoutez les informations
if ($user_id && $id_advertisement) {
    $keepInformationController->addInformation($user_id, $id_advertisement);
    echo "L'information a été ajoutée avec succès.";
} else {
    echo "Erreur : les paramètres user_id et id_advertisement sont nécessaires.";
    }  
}


?>

