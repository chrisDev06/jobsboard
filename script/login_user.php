<?php
session_start();
require_once '../config/config.php';

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

if (isset($_POST['envoi'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);

        $takeUser = $db->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
        if ($takeUser) {
            $takeUser->execute(array($email, $password));

            if ($takeUser->rowCount() > 0) {
                $user = $takeUser->fetch();

                $_SESSION['email'] = $email;
                $_SESSION['role'] = $user['role'];  // Ajout du rôle dans la session

                if ($user['role'] === 'admin') {
                    header("Location: ../views/admin_dashboard.php");  // Rediriger vers le dashboard admin
                }
                elseif(($user['role'] === 'employeur')){
                    header("Location: ../views/employeur_dashboard.php");  // Rediriger vers le dashboard admin

                }
                else {
                    header("Location: ../views/index.php");
                }
                exit();
            } else {
                echo "Identifiants incorrects.";
            }
        } else {
            $errors = $db->errorInfo();
            print_r($errors);
        }
    } else {
        echo "Veuillez compléter tous les champs.";
    }
}
?>
