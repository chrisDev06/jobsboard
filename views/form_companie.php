<!DOCTYPE html>
<html>
    <head>
        <title>New Companie</title>
    </head>

    <body>
        <h2>Add a new companie</h2>
        <form action="../script/add_companie_action.php" method="post">
        
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

        <input type="submit" value="Ajouter">
        </form>
    </body>
</html>