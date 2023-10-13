<?php
session_start();

// Vérifier si la clé 'email' est définie dans la session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    echo $email;
    // Utilisez l'email comme nécessaire
} else {
    // La clé 'email' n'est pas définie, faites quelque chose pour gérer cette situation
    echo 'Email non défini dans la session.';
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

// if(!$_SESSION['password']){
//     header("Location: ../views/log/login.php"); // Rediriger vers la liste des utilisateurs

// }
?>
<a href="./log/login.php">Connecter</a>
<a href="./log/register.php">register</a>
<a href="../script/deconnect.php">Se déconnecter</a>
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
    </tr>
<?php endforeach; ?>



</table>

<a href="form_user.php">Ajouter un utilisateur</a>
