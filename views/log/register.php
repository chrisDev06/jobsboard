
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<form action="../../script/register_user.php" method="post">
  <div class="form-group">
    <label for="">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
  </div>
  <input type="submit" name="add" value="Ajouter">

</form>
</body>
</html>