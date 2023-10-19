
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <?php include('_nav_log.php'); ?>

  <div class="container-signup">
    <div class="form-signup">
      <h1>Sign up !</h1>
      <form action="../../script/register_user.php" method="post">
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="role" value="employeur">
            <label class="form-check-label" for="role">Employeur</label><br>
        </div>
        <div class="form-group">
          <label for="">Email address</label>
          <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off">
        </div>
          <label for="">Password</label>
          <input name="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
        <div class="form-group" id="inline-block-name">
          <label for="">First Name :</label>
          <input name="first_Name" type="test" class="form-control" placeholder="First Name" autocomplete="off">
        </div>
        <div class="form-group" id="inline-block-name">
          <label for="">Last Name :</label>
          <input name="last_Name" type="test" class="form-control" placeholder="Last Name" autocomplete="off">
        </div>
        <div class="form-group" id="inline-block-name">
          <label for="">Date of birth :</label>
          <input name="date_of_Birth" type="date" class="form-control" placeholder="Date of birth" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="">Address :</label>
          <input name="address" type="text" class="form-control" placeholder="Address" autocomplete="off">
        </div>
        <div class="form-group" id="inline-block-city">
          <label for="">Postal Code :</label>
          <input name="postal_Code" type="text" class="form-control" placeholder="Postal Code" autocomplete="off">
        </div>
        <div class="form-group" id="inline-block-city">
          <label for="">City :</label>
          <input name="city" type="text" class="form-control" placeholder="City" autocomplete="off">
        </div>
        <div class="form-group" id="inline-block-city">
          <label for="">Country :</label>
          <input name="country" type="text" class="form-control" placeholder="Country" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="">Phone Number :</label>
          <input name="phone_Number" type="text" class="form-control" placeholder="Phone Number" autocomplete="off"><br>
        </div>
        <input type="submit" name="register" value="Sign up !" class="btn btn-primary">
      </form>
    </div>
  </div>
  <div class="img-signup">
    <img src="../../public/img/Sign up-amico.png" alt="Sign up">
  </div>
</body>
</html>