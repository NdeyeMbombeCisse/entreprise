<?php
// inclusion du fichier config
include"config.php";
// verification de la soumission du formulaire
if(isset($_POST['ajouter'])){
    // recuperation des valeurs soumises
    $libele = $_POST['libele'];
    $description = $_POST['description'];
    $date_echeance = $_POST['date_echeance'];
    $priorite = $_POST['priorite'];
    $etat = $_POST['etat'];

    // verifier si les champs ne sont pas vide
    if($libele !="" && $description !="" && $date_echeance !="" && $priorite !="" && $etat !=""){
        // creation d'un objet pour l'insertion des taches
        $tache->add($libele,$description,$date_echeance,$priorite,$etat);
    }


}



?>

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
    </nav>
</header> 
<h1>AJOUTER UNE TACHE</h1>
<form action="" method="post">
    <fieldset>
        <div class="remplir">
            <label for="libele">quel est le libele de la tache?</label>
            <input type="text" name="libele" >

        </div>

        <div class="remplir">
            <label for="description">quelle est la description  de la tache?</label>
            <input type="text" name="description" >

        </div>
        <div class="remplir">
            <label for="date_echeance">quel est la date d'echeance de la tache?</label>
            <input type="date" name="date_echeance" >

        </div>
        <div class="remplir">
            <label for="priorite">donner la priorite de la tache</label>
            <select name="priorite" id="priorite">
                <option value="faibe">faibe</option>
                <option value="moyen">moyen</option>
                <option value="eleve">eleve</option>
            </select>
        </div>
        <div class="remplir">
            <label for="etat">donner la etat de la tache</label>
            <select name="etat" id="etat">
                <option value="a faire"> faire</option>
                <option value="en cours">en cours</option>
                <option value="terminee">terminee</option>
            </select>
        </div>
        <input type="submit" value="ajouter" name="ajouter" id="bouton">



    </form>

    </fieldset>
    
</body>
</html>