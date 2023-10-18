
<?php
session_start();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  
} else {
  echo 'ID utilisateur non défini dans la session.';
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];

} else {
    echo 'Email non défini dans la session.';
}

require_once '../controllers/AdvertisementController.php';
require_once '../config/config.php';

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $advertisementControler = new AdvertisementController($db);
    $advertisements = $advertisementControler->getAllAdvertisement();
} catch (PDOException $e) {
    echo 'Database connection error: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</head>

<body>

    <div class="">
        <a href="./log/login.php">Connecter</a>
        <a href="./log/register.php">register</a>
        <a href="./log/deconnect.php">Se déconnecter</a>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#"><img class="logo" src="../public/img/logo.png" alt="Logo">FastJobs</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lien 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lien 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lien 3</a>
                    </li>
                </ul>
                <button class="btn my-2 my-sm-0" type="button">Se connecter</button>
            </div>
        </nav>

        <div class="container_search_input">
            <input class="form-control input_search" type="search" placeholder="Search" aria-label="Search">
        </div>
        <div class="container_carrou_home">
            <div class="void" id="void">
                <div class="crop">
                    <ul class="ul_carrou_rotate" id="card-list" style="--count: 6;">
                        <?php foreach ($advertisements as $advertisement) : ?>
                            <li class="li_carrou_rotate">
                                <div class="card_rotate">
                                    <a href=""><span class="model-name"><?= $advertisement['title'] ?></span><span><?= $advertisement['desc'] ?></span></a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="last-circle"></div>
                    <div class="second-circle"></div>
                </div>
                <div class="mask"></div>
                <div class="center-circle"></div>
            </div>
        </div>
        <div class="separateur"></div>
        <!DOCTYPE html>
<html lang="fr">

<div class="container_carrou_slide">
        <section class="articles">
            <article>
                <?php foreach ($advertisements as $advertisement) : ?>
                    <div class="article-wrapper">
                        <figure>
                            <img src="https://picsum.photos/id/103/800/450" alt="" />
                        </figure>
                        <div class="article-body">
                            <h2><?= $advertisement['title'] ?></h2>
                            <p><?= $advertisement['desc'] ?></p>
                            <div class="container">
                                <!-- Afficher les informations supplémentaires lorsqu'on clique sur "Learn More" -->
                                <div class="ad-details" style="display: none;">
                                    <p><strong>Description :</strong> <?= $advertisement['desc'] ?></p>
                                    <p><strong>Adresse :</strong> <?= $advertisement['address'] ?></p>
                                    <p><strong>Code postal :</strong> <?= $advertisement['zip_code'] ?></p>
                                    <p><strong>Pays :</strong> <?= $advertisement['country'] ?></p>
                                    <p><strong>Ville :</strong> <?= $advertisement['city'] ?></p>
                                    <p><strong>Salaire :</strong> <?= $advertisement['salary'] ?></p>
                                    <p><strong>Date :</strong> <?= $advertisement['date'] ?></p>
                                    <p><strong>Téléphone :</strong> <?= $advertisement['phone'] ?></p>
                                    <p><strong>Contact :</strong> <?= $advertisement['contact'] ?></p>
                                </div>
                                <button class="learn-more-button" onclick="toggleAdDetails(this)">Learn More</button>
                            </div>
                            <div class="container">
                                <!-- Bouton "Apply" qui ouvre le formulaire -->
                                <button class="apply-button" onclick="openApplicationForm('applicationForm<?= $advertisement['id_advertisement'] ?>')">Apply</button>

                                <!-- Formulaire d'application masqué -->
                                <div id="applicationForm<?= $advertisement['id_advertisement'] ?>" class="application-form" style="display: none;">
                                    <h3>Postuler pour <?= $advertisement['title'] ?></h3>
                                    <form action="../script/postuler.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">
                                        <input type="hidden" name="id_advertisement" value="<?= $advertisement['id_advertisement'] ?>">
                                        <label for="first_Name">Prénom :</label>
                                        <input type="text" id="first_Name" name="first_Name" required><br>

                                        <label for="last_Name">Nom :</label>
                                        <input type="text" id="last_Name" name="last_Name" required><br>

                                        <label for="address">Adresse :</label>
                                        <input type="text" id="address" name="address" required><br>

                                        <label for="city">Ville :</label>
                                        <input type="text" id="city" name="city" required><br>

                                        <label for="postal_Code">Code Postal :</label>
                                        <input type="text" id="postal_Code" name="postal_Code" required><br>

                                        <label for="country">Pays :</label>
                                        <input type="text" id="country" name="country" required><br>

                                        <label for="email">Email :</label>
                                        <input type="email" id="email" name="email" required><br>

                                        <label for="phone_Number">Téléphone :</label>
                                        <input type="text" id="phone_Number" name="phone_Number" required><br>


                                        <input type="submit" name="postuler" value="Envoyer la candidature">
</form>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </article>
        </section>
    </div>

    <script>
        function toggleAdDetails(button) {
            const adDetails = button.previousElementSibling;
            adDetails.style.display = adDetails.style.display === 'none' || adDetails.style.display === '' ? 'block' : 'none';
        }

        function openApplicationForm(formId) {
            const applicationForm = document.getElementById(formId);
            if (applicationForm) {
                applicationForm.style.display = 'block';
            } else {
                console.error('Formulaire non trouvé avec l\'ID : ' + formId);
            }
        }
    </script>
</body>

</html>

