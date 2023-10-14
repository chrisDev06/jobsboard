<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] == 'user') {
    header("Location: ../index.php");
}


require_once '../controllers/UserController.php';
require_once '../config/config.php';


try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userController = new UserController($db);
    $users = $userController->getAllUsers();
} catch (PDOException $e) {
    echo 'Database connection error: ' . $e->getMessage();
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Employeur Home Page</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user) : ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['first_Name'] ?></td>
        <td><?= $user['last_Name'] ?></td>
        <td><a href="../script/delete_user.php?id=<?= $user['id'] ?>">Supprimer</a></td>
        <td><button onclick="openUpdateForm(<?= $user['id'] ?>)">Modifier</button></td>

    </tr>
<?php endforeach; ?>



</table>
<script>
    function openUpdateForm(userId) {
        // Rediriger vers la page d'édition avec l'ID de l'utilisateur
        window.location.href = `edit_user.php?id=${userId}`;
    }
</script>

</body>
</html>
