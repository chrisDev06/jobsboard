<?php
session_start();
require_once '../controllers/UserController.php';
require_once '../config/config.php';

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
$userController = new UserController($db);

if (isset($_POST['add'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        $role = $_POST['role']; 

        // Appel de la méthode addUser avec le rôle en paramètre
        $userController->addUser($email, $password, $role);
    }
}

header("Location: ../views/admin_dashboard.php"); // Rediriger vers la liste des utilisateurs
?>
