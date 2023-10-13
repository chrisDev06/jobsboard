<?php
session_start();
require_once '../controllers/UserController.php';
require_once '../config/config.php';


$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

 
 $userController = new UserController($db);
 
 $email = $_POST['email'];
 $password = $_POST['password'];
 
 $userController->addUser($email, $password);

if(isset($_POST['envoi']))
{
    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        $email= htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        
        $takeUser = $db->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
        $takeUser->execute(array($email, $password));
        if($takeUser->rowCount() > 0){
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;
          $_SESSION['id'] = $takeUser->fetch()['id'];
        }

   var_dump($_SESSION['id']); 
       

    }else{
      // message erreur
    }
}

?>