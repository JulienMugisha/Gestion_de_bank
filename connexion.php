<?php 
session_start();
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo_par_defaut ="admin";
        $mdp_par_defaut="admin1234";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location: index.php');
        }else{
            echo"Votre mot de passe ou pseudo est incorrect";
        }
    }
    else {
        echo "veuillez completer tout le champs";
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de bank</title>
</head>
<body>
    <p>Connection admin</p>
    <form method="POST" action="" >
        <input type="text" name="pseudo" autocomplete="off">
        <br><br>

        <input type="password" name="mdp">
        <br><br>
        
        <!-- <input type="submit" name="valider"> -->
        <button type="submit" name="valider">Login</button>
    </form>
</body>
</html>