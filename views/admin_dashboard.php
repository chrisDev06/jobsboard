<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] == 'user') {
    header("Location: ../index.php");
}
require_once '../controllers/CompanieController.php';
require_once '../controllers/UserController.php';
require_once '../config/config.php';

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userController = new UserController($db);
    $users = $userController->getAllUsers();


    $companieController = new CompanieController($db) ;
    $companies = $companieController->getAllCompanies();
} catch (PDOException $e) {
    echo 'Database connection error: ' . $e->getMessage();
}
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin_dashboard</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="./styles/admin.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>
    <div class="card_admin">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Users</b></h2>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3">
                        <a href="./add_user.php" class="btn btn-success" data-toggle="modal"><i  class="material-icons">&#xE147;</i> <span>Add New Users</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['first_Name'] ?></td>
                            <td><?= $user['last_Name'] ?></td>
                            <td>
                                <a class="edit" onclick="openUpdateForm(<?= $user['user_id'] ?>)" style="cursor: pointer;"> <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="../script/delete_user.php?user_id=<?= $user['user_id'] ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>

    <div class="card_admin">
    <div class="table-wrapper">
    <table class="table table-striped table-hover">
    <div class="col-sm-6 mb-3 mt-3">
                        <a href="./form_companie.php" class="btn btn-success" data-toggle="modal"><i  class="material-icons">&#xE147;</i> <span>Add New Companie</span></a>
                    </div>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Address</th>
                <th>City</th>
                <th>Zip code</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companies as $companie) : ?>
                <tr>
                    <td><?= $companie['id_companie'] ?></td>
                    <td><?= $companie['name'] ?></td>
                    <td><?= $companie['email'] ?></td>
                    <td><?= $companie['number'] ?></td>
                    <td><?= $companie['address'] ?></td>
                    <td><?= $companie['city'] ?></td>
                    <td><?= $companie['zip_code'] ?></td>
                    <td><?= $companie['country'] ?></td>
                    <td>
                        <a href="../script/delete_companie.php?id_companie=<?= $companie['id_companie'] ?>">Delete</a>
                        <a class="edit" onclick="openUpdateFormCompanie(<?= $companie['id_companie'] ?>)" style="cursor: pointer;"> <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    </div>

<script>
    function openUpdateForm(userId) {
        // Rediriger vers la page d'édition avec l'user_id de l'utilisateur
        window.location.href = `edit_user.php?user_id=${userId}`;
    }

    function openUpdateFormCompanie(id_companie) {
        // Rediriger vers la page d'édition avec l'user_id de l'utilisateur
        window.location.href = `update_companie_form.php?id_companie=${id_companie}`;
    }
</script>
</body>
</html>
