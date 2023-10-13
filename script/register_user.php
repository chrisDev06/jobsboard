<?php
session_start();
require_once '../controllers/UserController.php';
require_once '../config/config.php';

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
$userController = new UserController($db);

if (isset($_POST['add'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);

        // Maintenant, nous avons les bonnes valeurs d'email et de mot de passe
        $userController->addUser($email, $password);

        $takeUser = $db->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
        $takeUser->execute(array($email, $password));
        if ($takeUser->rowCount() > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $takeUser->fetch()['id'];
        }
    } else {
        // message erreur
    }
}

header("Location: ../views/index.php"); // Rediriger vers la liste des utilisateurs
?>
