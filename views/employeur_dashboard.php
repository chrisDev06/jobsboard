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
    <link rel="stylesheet" href="./styles/employeur.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php echo $_SESSION["email"] ?>
    <a href="../../script/deconnect.php">Se déconnecter</a>
    <div class="container">
        <div class="div1">
            <h2>Mes offres</h2>
            <div class="">
                <div class="main">
                    <ul class="cards">
                    <li class="cards_item">
                            <div class="card_jobs" tabindex="0">
                                <div class="card_content">
                                    <h2 class="card_title">Developpeur web Fullsack</h2>
                                    <div class="card_text">
                                        <div class="container">
                                            <div class="div1">Salaire : 2500 €</div>
                                            <div class="div2">Type de contrat : CDI</div>
                                                <div class="">Adresse</div> 
                                               <p>(desc) : 
                                                Vous êtes dynamique, enthousiaste, passionné(e) par le service et le conseil à la clientèle ? Le métier de barista est pour vous !
                                                Intégré(e) à une équipe énergique, vous veillerez à apporter aux clients une expérience inoubliable de nos salons de café.
                                                Vos missions? Accueillir la clientèle et la conseiller sur nos cafés, fournir un service convivial et efficace, préparer nos boissons et produits avec soin et maintenir un environnement propre et confortable.
                                            </p>
                                        </div>
                                        <p>Date création</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="cards_item">
                            <div class="card_jobs" tabindex="0">
                                <div class="card_content">
                                    <h2 class="card_title">Developpeur web Fullsack</h2>
                                    <div class="card_text">
                                        <div class="container">
                                            <div class="div1">Salaire : 2500 €</div>
                                            <div class="div2">Type de contrat : CDI</div>
                                                <div class="">Adresse</div> 
                                               <p>(desc) : 
                                                Vous êtes dynamique, enthousiaste, passionné(e) par le service et le conseil à la clientèle ? Le métier de barista est pour vous !
                                                Intégré(e) à une équipe énergique, vous veillerez à apporter aux clients une expérience inoubliable de nos salons de café.
                                                Vos missions? Accueillir la clientèle et la conseiller sur nos cafés, fournir un service convivial et efficace, préparer nos boissons et produits avec soin et maintenir un environnement propre et confortable.
                                            </p>
                                        </div>
                                        <p>Date création</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="div2">
            <h2>Mon entreprise</h2>
            <div class="card" >
                <div class="card-header">
                    Title
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">adresse</li>
                    <li class="list-group-item">ville</li>
                    <li class="list-group-item">code postal</li>
                    <li class="list-group-item">pays</li>
                    <li class="list-group-item">telephone</li>
                    <li class="list-group-item">date_fondation</li>
                    <li class="list-group-item">email contact</li>
                    <li class="list-group-item">secteur_activite</li>
                    <li class="list-group-item">site_web</li>
                    <li class="list-group-item">email contact</li>
                    <li class="list-group-item">description</li>

                </ul>
            </div>
        </div>
    </div>
</body>
</html>
