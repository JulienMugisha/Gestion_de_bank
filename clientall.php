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
    <title>All client</title>
</head>
<body>
    <?php
        $recupClients = $bdd->query('SELECT * FROM ajouterclient');
        while ($clients = $recupClients->fetch()) {
            # code...
            ?>
            <div classe="clients" style="border: 1px solid black; border-radius: 10px">
                <P><?= $clients['nom'];?> <?= $clients['postnom'];?></P>
                <a href="supprimerclient.php?id=<?= $clients['id']?>">
                <button style="color:red; backgroud-color: red; margin-buttom: 8px;">Supprimer client</button>
                </a>
                <a href="modifierclient.php?id=<?= $clients['id']?>">
                <button style="color:yellow; backgroud-color: red; margin-buttom: 8px; color: black">Modifier client</button>
                </a>
            </div>
            <br>
            <?php
        }
    ?>
</body>
</html>