<?php
session_start();
require_once '../config/config.php';

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

if(isset($_POST['envoi'])){
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);  

        // Vérification de la préparation de la requête SQL
        $takeUser = $db->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
        if ($takeUser) {
            $takeUser->execute(array($email, $password));
            
            // Vérification du résultat de l'exécution
            if ($takeUser->rowCount() > 0) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['id'] = $takeUser->fetch()['id'];
                header("Location: ../views/index.php");
                exit();
            } else {
                echo "Identifiants incorrects.";
            }
        } else {
            // Afficher les erreurs de préparation de la requête SQL
            $errors = $db->errorInfo();
            print_r($errors);
        }
    } else {
        echo "Veuillez compléter tous les champs.";
    }
}
?>
