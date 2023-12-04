<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
//verifie si le user clik sur le boton envoie
if(isset($_POST['envoie'])){
    if(!empty($_POST['nom']) AND !empty($_POST['postnom']));{
        $nom = htmlspecialchars($_POST['nom']);
        $postnom = htmlspecialchars($_POST['postnom']);
        //inserer maintenant les contenu dans la bd

        $insererclient = $bdd->prepare('INSERT INTO ajouterclient(nom, postnom) VALUES (?, ?)');
        $insererclient->execute(array($nom, $postnom));
        echo "Le client est bel et bien client";
         
    }
    // else{
    //          echo "Veullez complete tous les champs";
    //      }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
</head>
<body>
    <form action="" method="POST">
        <p>Saisir les identite du client</p>
        <p>nom</p>
        <input type="text" name="nom">
        <br>
        <p>postnom</p>
        <input type="text" name="postnom">
        <br><br>
        <!-- <input type="submit" name="envoie"> -->
        <button type="submit" name="envoie">Ajouter</button>
    </form>
</body>
</html>