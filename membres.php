<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les membres</title>
</head>
<body>
    <?php
        $recupUsers = $bdd->query('SELECT * FROM membres');
        while($users = $recupUsers->fetch()){
            ?>
            <p><?= $users['pseudo'] ?><a href="bannir.php?id=<?= $users['id'];?>" style="color:red; text-decoration:none;">           Effacer le compte du client</a></p>
            <?php
        }
    ?>
</body>
</html>