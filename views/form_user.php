<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h2>Ajouter un utilisateur</h2>
    <form action="../script/add_user_action.php" method="post">
        <label>Email:</label><br>
        <input type="text" name="email"><br>
        <label>Prénom:</label><br>
        <input type="text" name="first_name"><br>
        <label>Nom:</label><br>
        <input type="text" name="last_name"><br><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
