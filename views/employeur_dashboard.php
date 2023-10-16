<?php
session_start();
require_once '../config/config.php';

if (!isset($_SESSION["role"]) || $_SESSION["role"] == 'user') {
    header("Location: ../index.php");
}
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/log/login.php");
    var_dump($_SESSION);
    exit();
}

// Récupérer l'ID de l'utilisateur depuis la session
$userId = $_SESSION['user_id'];

try {
    // Initialiser la connexion à la base de données
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les informations de l'entreprise liée à cet utilisateur
    $stmt = $db->prepare("
        SELECT *
        FROM companies
        WHERE user_id = :user_id
    ");
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $companyInfo = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    exit();
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
                <?php
// ...

if ($companyInfo) {
    
    echo '<ul class="list-group list-group-flush">';
    echo '<li class="list-group-item">ID de l\'entreprise : ' . $companyInfo['id_companie'] . '</li>';
    echo '<li class="list-group-item">Email de l\'entreprise : ' . $companyInfo['email'] . '</li>';
    echo '<li class="list-group-item">Nom de l\'entreprise : ' . $companyInfo['name'] . '</li>';
    echo '<li class="list-group-item">Numéro de téléphone : ' . $companyInfo['number'] . '</li>';
    echo '<li class="list-group-item">Adresse : ' . $companyInfo['address'] . '</li>';
    echo '<li class="list-group-item">Code postal : ' . $companyInfo['zip_code'] . '</li>';
    echo '<li class="list-group-item">Pays : ' . $companyInfo['country'] . '</li>';
    echo '<li class="list-group-item">Ville : ' . $companyInfo['city'] . '</li>';
    // echo '<a href="../script/delete_companie.php?id_companie=' . $companie['id_companie'] . '">Delete</a>';
    // echo '<a href="update_companie_form.php?id_companie=' . $companie['id_companie'] . '">Modifier</a>';

    echo '</ul>';
} else {
    echo '<p>Aucune entreprise associée à cet utilisateur.</p>';
}
?>

                </ul>
            </div>
        </div>
        <h2>Créer une annonce</h2>
        <form action="../script/add_advertissement.php" method="post">
            <label for="title">Titre :</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="address">Adresse :</label><br>
            <input type="text" id="address" name="address"><br>
            <label for="zip_code">Code postal :</label><br>
            <input type="text" id="zip_code" name="zip_code"><br>
            <label for="country">Pays :</label><br>
            <input type="text" id="country" name="country"><br>
            <label for="city">Ville :</label><br>
            <input type="text" id="city" name="city"><br>
            <label for="description">Description :</label><br>
            <textarea id="description" name="desc"></textarea><br>
            <label for="salary">Salaire :</label><br>
            <input type="text" id="salary" name="salary"><br>
            <label for="date">Date de début :</label><br>
            <input type="date" id="date" name="date"><br>
            <label for="phone">Numéro de téléphone :</label><br>
            <input type="text" id="phone" name="phone"><br>
            <label for="contact">Contact :</label><br>
            <input type="text" id="contact" name="contact"><br><br>
            <input type="submit" value="Créer">
        </form>

       

    </div>
</body>
</html>
