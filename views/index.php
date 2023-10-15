<?php
session_start();

// Vérifier si la clé 'email' est définie dans la session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];

    echo $email;
    echo $role;

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

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Home</title>
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
          <li class="li_carrou_rotate">
            <div class="card_rotate"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly dimensional, mostly numeric, tabular data</span></a></div>
          </li>
          <li class="li_carrou_rotate">
            <div class="card_rotate"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly dimensional, mostly numeric, tabular data</span></a></div>
          </li>
          <li class="li_carrou_rotate">
            <div class="card_rotate"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly dimensional, mostly numeric, tabular data</span></a></div>
          </li>
          <li class="li_carrou_rotate">
            <div class="card_rotate"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly dimensional, mostly numeric, tabular data</span></a></div>
          </li>
          <li class="li_carrou_rotate">
            <div class="card_rotate"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly dimensional, mostly numeric, tabular data</span></a></div>
          </li>
          <li class="li_carrou_rotate">
            <div class="card_rotate"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly dimensional, mostly numeric, tabular data</span></a></div>
          </li>
        </ul>
        <div class="last-circle"></div>
        <div class="second-circle"></div>
      </div>
      <div class="mask"></div>
      <div class="center-circle"></div>
    </div>
  </div>
  <div class="separateur">

  </div>
  <div class="container_carrou_slide"><section class="articles">
  <article>
    <div class="article-wrapper">
      <figure>
        <img src="https://picsum.photos/id/1011/800/450" alt="" />
      </figure>
      <div class="article-body">
        <h2>This is some title</h2>
        <p>
          Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="https://picsum.photos/id/1005/800/450" alt="" />
      </figure>
      <div class="article-body">
        <h2>This is some title</h2>
        <p>
          Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="https://picsum.photos/id/103/800/450" alt="" />
      </figure>
      <div class="article-body">
        <h2>This is some title</h2>
        <p>
          Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
</section></div>
 </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
