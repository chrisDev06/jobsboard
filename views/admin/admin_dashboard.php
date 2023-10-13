<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] == 'user') 
{    
	header("Location: ../index.php");

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home Page</title>
</head>
<body>
    <h1>THIS IS ADMIN HOME PAGE</h1>
    <?php echo $_SESSION["email"] ?>
    <a href="logout.php">Logout</a>
</body>
</html>
