<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../views/index.php"); // Rediriger vers la liste des utilisateurs
?>
