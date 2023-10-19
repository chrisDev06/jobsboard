<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>nav</title>
</head>
<body>
    <header>
    <div class="container-nav">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href=""><img class="logo" src="../public/img/logo.png" alt="Logo">FastJobs</a>
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
            <button class="btn my-2 my-sm-0" type="button" onclick="window.location.href = './log/login.php'">Se connecter</button>
            </div>
        </nav>
    </header>
</body>
</html>