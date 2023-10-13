
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="../../script/login_user.php" method="POST">
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
        </div>
        <input type="submit" name="envoi" value="envoi">
    </form>
</body>
</html>
