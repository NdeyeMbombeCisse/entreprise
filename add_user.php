
<?php
// inclusion du fichier config
include"config.php";
// verification de la soumission du formulaire
if(isset($_POST['ajouter'])){
    // recuperation des valeurs soumises
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $num_tel = $_POST['num_tel'];

    // verifier si les champs ne sont pas vide
    if($prenom !="" && $nom !="" && $email !="" && $mdp !="" && $num_tel !=""){
        // creation d'un objet pour l'insertion des taches
        $user->ajouter($prenom,$nom,$email,$mdp,$num_tel);
    }


}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>gestion des taches</title>
</head>
<body>
<header>
    <nav>
        <a href="create.php">ADD TACHES</a>
        <a href="read.php">LISTE_TACHES</a> 
        <a href="read.php">ADD USER</a> 
        <a href="read.php">LISTE USER</a> 
    </nav>
</header> 
<h1>AJOUTER UN UTILISATEURS</h1>
<form action="" method="post">
    <fieldset>
        <div class="remplir">
            <label for="prenom">quel est votre prenom?</label>
            <input type="text" name="prenom" >

        </div>
        <div class="remplir">
            <label for="nom">quel est votre nom?</label>
            <input type="text" name="nom" >

        </div>
        <div class="remplir">
            <label for="email">quel est votre email?</label>
            <input type="text" name="email" >

        </div>
        <div class="remplir">
            <label for="mdp">quel est votre mdp?</label>
            <input type="text" name="mdp" >

        </div>
        <div class="remplir">
            <label for="num_tel">quel est votre num_tel?</label>
            <input type="text" name="num_tel" >

        </div>
        <input type="submit" value="ajouter" name="ajouter" id="bouton">



</form>

</fieldset>