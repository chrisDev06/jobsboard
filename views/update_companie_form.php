<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
    </head>

    <body>
        <h2>Update companie</h2>
        <form action="../script/update_companie.php" method="post">

        <input type="hidden" name="id_companie" value="<?php echo $_GET['id_companie']; ?>" readonly><br>

        <label>Name:</label><br>
        <input type="text" name="name"><br>

        <label>Email:</label><br>
        <input type="text" name="email"><br>

        <label>Number:</label><br>
        <input type="text" name="number"><br>

        <label>Address:</label><br>
        <input type="text" name="address"><br>

        <label>city :</label><br>
        <input type="text" name="city"><br>

        <label>Zip code:</label><br>
        <input type="text" name="zip_code"><br>
        
        <label>Country:</label><br>
        <input type="text" name="country"><br>

        <input type="submit" value="Update">
        </form>
    </body>
</html>