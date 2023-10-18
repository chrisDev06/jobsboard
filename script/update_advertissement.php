<?php 
require_once '../controllers/AdvertisementController.php';
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $advertissementController = new AdvertisementController($db);

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
        $id_advertisement = $_POST['id_advertisement'];
        $company_id = $_POST['company_id'];

        $advertissementController->updateAdvertisement($id_advertisement, $title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id);

        header('Location: ../views/admin_dashboard.php');
        exit();
    } catch (PDOException $e) {
        echo 'Echec' . $e->getMessage();
    }
}
?>