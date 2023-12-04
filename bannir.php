<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
//creer une condition pour voir si l'id est bien recuperer
if(isset($_GET['id']) AND !empty($_GET['id'])){
    //on va verifier dans la bd si id correspont a celle du users
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM membres WHERE id =?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0){
        //crerr le systeme pour banir l'user
        $bannirUser = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $bannirUser->execute(array($getid));
        header('Location: membres.php');
    } else{
        echo "Aucun client trouver";
    }
}
else{
    echo"l'indetifiant n'a pas ete recuperer";
}
?>