
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
    <?php include('_nav_log.php'); ?>

    <div class="container-log">
        <div class="form-login">
            <h1>Connexion</h1>
                <form action="../../script/login_user.php" method="POST" class="form-group">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password" autocomplete="off" class="form-control">
                    </div>
                    <input type="submit" name="envoi" value="Connexion" class="btn btn-primary">
                    <button class="btn my-2 my-sm-0 btn-primary" type="button" onclick="window.location.href = 'register.php'">Register now !</button>
                </form>
        </div>
        <img src="../../public/img/computer.png" alt="Login picture">
    </div>
</body>
</html>

