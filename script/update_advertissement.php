<?php
// Inclure les fichiers requis
require_once '../controllers/AdvertisementController.php';
require_once '../config/config.php';

// Vérifier la méthode de la requête
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    try {
        // Créer une connexion à la base de données
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Créer une instance du contrôleur d'annonces
        $advertissementController = new AdvertisementController($db);

        // Récupérer les données de la requête JSON
        $input_data = file_get_contents('php://input');
        $put_data = json_decode($input_data, true);

        // Récupérer les données à partir du tableau JSON
        $title = $put_data['title'];
        $address = $put_data['address'];
        $zip_code = $put_data['zip_code'];
        $country = $put_data['country'];
        $city = $put_data['city'];
        $desc = $put_data['desc'];
        $salary = $put_data['salary'];
        $date = $put_data['date'];
        $phone = $put_data['phone'];
        $contact = $put_data['contact'];
        $id_advertisement = $put_data['id_advertisement'];
        $company_id = $put_data['company_id'];

        // Appeler la méthode de mise à jour de l'annonce
        $advertissementController->updateAdvertisement($id_advertisement, $title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id);

        // Répondre avec une réponse JSON si nécessaire
        $response = ['message' => 'Annonce mise à jour avec succès'];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    } catch (PDOException $e) {
        // Gérer les erreurs ici
        $error_message = 'Échec : ' . $e->getMessage();
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => $error_message]);
        exit();
    }
}
?>
