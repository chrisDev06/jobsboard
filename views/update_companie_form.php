<?php
session_start();

require_once '../controllers/CompanieController.php';
require_once '../config/config.php';
require_once '../models/UserModel.php';

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $companieController = new CompanieController($db);

    // Vérifiez si 'user_id' est défini dans $_GET
    if (isset($_GET['id_companie'])) {
        $id_companie = $_GET['id_companie'];
        $companieDetail = $companieController->getCompanieDetails($id_companie);

        if (!$companieDetail) {
            echo "Aucun utilisateur trouvé pour l'ID spécifié.";
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
} catch (PDOException $e) {
    echo 'Database connection error: ' . $e->getMessage();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
    </head>

    <body>
        <h2>Update companie</h2>
        <form action="../script/update_companie.php" method="post">

        <input type="hidden" name="id_companie" value="<?php echo $_GET['id_companie']; ?>" readonly><br>

        <label for="name">Title :</label>
        <input type="text" id="name" name="name" value="<?= $companieDetail['name'] ?>"><br>

        <label for="email">Email :</label>
        <input type="text" id="email" name="email" value="<?= $companieDetail['email'] ?>"><br>

        <label for="number">Numéro téléphone :</label>
        <input type="text" id="number" name="number" value="<?= $companieDetail['number'] ?>"><br>
       
        <label for="address">Adresse :</label>
        <input type="text" id="address" name="address" value="<?= $companieDetail['address'] ?>"><br>
       
        <label for="country">Pays :</label>
        <input type="text" id="country" name="country" value="<?= $companieDetail['country'] ?>"><br>

        <label for="email">Ville :</label>
        <input type="text" id="city" name="city" value="<?= $companieDetail['city'] ?>"><br>
       
        <label for="zip_code">Code postal :</label>
        <input type="text" id="zip_code" name="zip_code" value="<?= $companieDetail['zip_code'] ?>"><br>
      
        <input type="submit" value="Update">
        </form>
    </body>
</html>