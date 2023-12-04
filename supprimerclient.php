<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupClient = $bdd->prepare('SELECT * FROM ajouterclient WHERE id=?');
    $recupClient->execute(array($getid));
    if($recupClient->rowCount() > 0){
        $deleteClient = $bdd->prepare('DELETE FROM ajouterclient WHERE id=?');
        $deleteClient->execute(array($getid));
        header('Location: clientall.php');
    }else echo "Aucun article trouver";
}else{
    echo "auncun identifiant trouver";
}
?>