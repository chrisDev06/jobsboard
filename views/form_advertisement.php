
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Advertisement</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <div class="container-signup">
    <div class="form-signup">
      <h1>Advertisement</h1>
      <form action="../script/add_advertissement.php" method="post">
        <div class="form-group">
          <label for="">Title :</label>
          <input name="title" type="text" class="form-control" placeholder="Title" autocomplete="off">
        <div class="form-group" id="inline-block-name">
          <label for="">Address :</label>
          <input name="address" type="text" class="form-control" placeholder="Address" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="">Zip code :</label>
          <input name="zip_code" type="text" class="form-control" placeholder="Zip code" autocomplete="off">
        </div>
        <div class="form-group" id="inline-block-city">
          <label for="">Country :</label>
          <input name="country" type="text" class="form-control" placeholder="Country" autocomplete="off">
        </div>
        <div class="form-group" id="inline-block-city">
          <label for="">City :</label>
          <input name="city" type="text" class="form-control" placeholder="City" autocomplete="off">
        </div>
        <div class="form-group" id="inline-block-city">
          <label for="">Description :</label>
          <input name="desc" type="text" class="form-control" placeholder="Description" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="">Salary :</label>
          <input name="salary" type="text" class="form-control" placeholder="Salary" autocomplete="off"><br>
        </div>
        <div class="form-group">
          <label for="">Phone Number :</label>
          <input name="phone" type="text" class="form-control" placeholder="Phone Number" autocomplete="off"><br>
        </div>
        <div class="form-group">
          <label for="">Contact :</label>
          <input name="contact" type="text" class="form-control" placeholder="Contact" autocomplete="off"><br>
        </div>
        <div class="form-group" id="inline-block-name">
          <label for="">Date :</label>
          <input name="date" type="date" class="form-control" placeholder="Date" autocomplete="off">
        </div>
        <input type="submit" name="addAdvertisement" value="Publier" class="btn btn-primary">
      </form>
    </div>
  </div>
</body>
</html>