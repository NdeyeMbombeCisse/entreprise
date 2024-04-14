<?php
// Inclusion du fichier config
include "config.php";

// Vérification de la soumission du formulaire
if(isset($_POST['ajouter'])){
    // Récupération des valeurs soumises
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $num_tel = $_POST['num_tel'];
    // Récupération de l'id
    $id = $_GET['id'];
    // Appel de la méthode update
    $user->modifier($id,$prenom,$nom,$email,$mdp,$num_tel);
    // Redirection vers la page index
    header("location: read_user.php");
    exit(); // Terminer le script après la redirection
}

// Récupérer les données de l'employeur à mettre à jour
$id = $_GET['id'];
if(isset($id)){
    try{
        // Requête SQL pour sélectionner les employeurs avec des colonnes spécifiques
        $sql = "SELECT * FROM employer WHERE id = :id";
        $stmt=$connexion->prepare($sql);
        $stmt->bindparam(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            // Récupération des employeurs
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $prenom = $user['prenom'];
            $nom = $user['nom'];
            $email = $user['email'];
            $mdp = $user['mdp'];
            $num_tel = $user['num_tel'];
        }else {
            echo "Erreur lors de la récupération des données.";
        }

    }catch(PDOException $e){
        die("Erreur : " . $e->getMessage());

    }
}else {
    echo "ID non spécifié.";
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
        <a href="read.php">ADD USER</a> 
        <a href="read.php">LISTE USER</a> 
    </nav>
</header> 
<h1>AJOUTER UN UTILISATEURS</h1>
<form action="" method="post">
    <fieldset>
        <div class="remplir">
            <label for="prenom">quel est votre prenom?</label>
            <input type="text" name="prenom" value="<?php echo $prenom?>">

        </div>
        <div class="remplir">
            <label for="nom">quel est votre nom?</label>
            <input type="text" name="nom" value="<?php echo $nom?>">

        </div>
        <div class="remplir">
            <label for="email">quel est votre email?</label>
            <input type="text" name="email" value="<?php echo $email?>">

        </div>
        <div class="remplir">
            <label for="mdp">quel est votre mdp?</label>
            <input type="text" name="mdp" value="<?php echo $mdp?>">

        </div>
        <div class="remplir">
            <label for="num_tel">quel est votre num_tel?</label>
            <input type="text" name="num_tel" value="<?php echo $num_tel?>">

        </div>
        <input type="submit" value="ajouter" name="ajouter" id="bouton">
</form>
</fieldset>
