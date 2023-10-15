<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] == 'user') {
    header("Location: ../index.php");
}

require_once '../controllers/UserController.php';
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $userController = new UserController($db);

        $user_id = $_POST['id']; // Utilisez 'id' plutôt que 'user_id'
        $email = $_POST['email'];
        $first_name = $_POST['first_Name'];
        $last_name = $_POST['last_Name'];

        // Appeler la méthode pour mettre à jour l'utilisateur
        $userController->updateUser($user_id, $email, $first_name, $last_name);

        header("Location: ../views/admin_dashboard.php"); // Rediriger vers la liste des utilisateurs
        exit();
    } catch (PDOException $e) {
        echo 'Erreur lors de la mise à jour de l\'utilisateur : ' . $e->getMessage();
    }
}
?>
