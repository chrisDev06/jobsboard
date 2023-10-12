<?php
require_once '../controllers/UserController.php';
require_once '../config/config.php';

// La condition $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) 
// vérifie si la méthode de la requête est GET (lorsqu'un utilisateur clique sur un lien) et si l'ID est défini dans les paramètres GET de l'URL.
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $userController = new UserController($db);

        $id = $_GET['id'];

        $userController->deleteUser($id);

        header("Location: ../views/index.php"); // Rediriger vers la liste des utilisateurs
        exit();
    } catch (PDOException $e) {
        echo 'Erreur lors de la suppression de l\'utilisateur : ' . $e->getMessage();
    }
}
?>