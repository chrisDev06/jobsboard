<?php 
require_once '../controllers/CompanieController.php';
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_companie'])) {
    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $companieController = new CompanieController($db);
        
        $id_companie = $_GET['id_companie'];
        
        $companieController->deleteCompanie($id_companie);

        header('Location: ../views/companieIndex.php');
        exit();
    } catch (PDOException $e) {
        echo 'Erreur lors de la suppression de la companie' .$e->getMessage();
    }
}
?>