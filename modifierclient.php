<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupClient = $bdd->prepare('SELECT * FROM ajouterclient WHERE id=? ');
    $recupClient->execute(array($getid));
    if($recupClient->rowCount() > 0){
        $Clientinfo = $recupClient->fetch();
        $nom = $Clientinfo['nom'];
        $postnom = $Clientinfo['postnom'];

        if(isset($_POST['valider'])){
            $nom_saisi = htmlspecialchars($_POST['nom']);
            $postnom_saisie = htmlspecialchars($_POST['postnom']);
            //requete de modification
            $updateClient = $bdd->prepare('UPDATE ajouterclient SET nom =?, postnom = ? WHERE id =?');
            $updateClient->execute(array($nom_saisi, $postnom_saisie, $getid));

            header('Location: clientall.php');
        }
       
        
    }else{
        echo "Aucun client trouver";
    }

}else{
    echo "aucun id trouver";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier client</title>
</head>
<body>
    <form action="" method="POST">
        <p>nom</p>
        <input type="text" name="nom" value="<?= $nom; ?>">
        <br>
        <p>postnom</p>
        <input type="text" name="postnom" value="<?= $postnom; ?>">
        <br><br>
        <!-- <button type="submit" name="valider"></button> -->
        <input type="submit" name="valider">
    </form>
</body>
</html>