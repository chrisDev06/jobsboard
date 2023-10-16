<?php
require_once '../controllers/CompanieController.php';
require_once '../config/config.php';

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $companieController = new CompanieController($db) ;
    $companies = $companieController->getAllCompanies();
} catch (PDOException $e) {
    echo 'Database connection error: ' . $e->getMessage();
}
?>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Name :</th>
        <th>Email :</th>
        <th>Number :</th>
        <th>Address :</th>
        <th>City :</th>
        <th>Zip code :</th>
        <th>Country :</th>
    </tr>
    <?php foreach ($companies as $companie) : ?>
        <tr>
            <th><?= $companie['id_companie'] ?></th>
            <th><?= $companie['name'] ?></th>
            <th><?= $companie['email'] ?></th>
            <th><?= $companie['number'] ?></th>
            <th><?= $companie['address'] ?></th>
            <th><?= $companie['city'] ?></th>
            <th><?= $companie['zip_code'] ?></th>
            <th><?= $companie['country'] ?></th>
            <th><a href="../script/delete_companie.php?id_companie=<?=$companie['id_companie']?>">Delete</a></th>
            <th><a href="update_companie_form.php?id_companie=<?=$companie['id_companie']?>">Update</a></th>
        </tr>
    <?php endforeach; ?>
</table>

<a href="form_companie.php">New companie</a>