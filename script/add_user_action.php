<?php
require_once '../controllers/UserController.php';
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $userController = new UserController($db);

        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        // Appel à la méthode pour ajouter un utilisateur
        $userController->addUser($email, $first_name, $last_name);

        header("Location: ../views/index.php"); // Rediriger vers la liste des utilisateurs
        exit();
    } catch (PDOException $e) {
        echo 'Erreur lors de l\'ajout de l\'utilisateur : ' . $e->getMessage();
    }
}
?>
