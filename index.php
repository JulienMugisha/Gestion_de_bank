<?php
session_start();
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homet</title>
</head>
<body>
    <a href="membres.php">Afficher tout les clients</a>
    <br>
    <a href="ajouterclient.php">Ajouter un nouveau client</a>
    <br>
    <a href="clientall.php">All client</a>
</body>
</html>