<?php
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
        <td><?= $user['first_name'] ?></td>
        <td><?= $user['last_name'] ?></td>
        <td><a href="../script/delete_user.php?id=<?= $user['id'] ?>">Supprimer</a></td>
    </tr>
<?php endforeach; ?>



</table>

<a href="form_user.php">Ajouter un utilisateur</a>
