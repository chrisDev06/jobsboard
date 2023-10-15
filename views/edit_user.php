<?php
session_start();

require_once '../controllers/UserController.php';
require_once '../config/config.php';
require_once '../models/UserModel.php';

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userController = new UserController($db);

    // Vérifiez si 'user_id' est défini dans $_GET
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        // Obtenir les détails de l'utilisateur pour pré-remplir le formulaire
        $userDetails = $userController->getUserDetails($user_id);

        // Vérifiez si les détails de l'utilisateur sont récupérés avec succès
        if (!$userDetails) {
            echo "Aucun utilisateur trouvé pour l'ID spécifié.";
            exit();
        }
    } else {
        // Rediriger vers la liste des utilisateurs si 'user_id' n'est pas spécifié
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
    <title>Modifier l'utilisateur</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h2>Modifier l'utilisateur</h2>
    <form action="../script/update_user.php" method="POST">
        <input type="hidden" name="id" value="<?= $userDetails['user_id'] ?>">
        
        <label for="email">Email :</label>
        <input type="text" id="email" name="email" value="<?= $userDetails['email'] ?>"><br>

        <label for="first_name">Prénom :</label>
        <input type="text" id="first_name" name="first_Name" value="<?= $userDetails['first_Name'] ?>"><br>

        <label for="last_name">Nom :</label>
        <input type="text" id="last_name" name="last_Name" value="<?= $userDetails['last_Name'] ?>"><br>

        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
