<?php
// inclure le fichier de configuration
require_once "config.php";
// Récupérer les données des taches depuis la base de données
$resultat = $user->read_user();
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
        <a href="add_user.php">ADD USER</a> 
        <a href="read_user.php">LISTE USER</a> 
    </nav>
</header> 
<h1>LISTE DES UTILISATEURS UTILISATEURS</h1>
<table>
<thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">PRENOM</th>
            <th scope="col">NOM</th>
            <th scope="col">email</th>
            <th scope="col">MOT DE PASSE</th>
            <th scope="col">TELEPHONE</th>
            <th scope="col">MODIFIER</th>
            <th scope="col">SUPPRIMER</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($resultat as $user) { ?>
            <!-- Affichage des données dans les lignes du tableau -->
            <tr class="trow">
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['prenom']; ?></td>
                <td><?php echo $user['nom']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['mdp']; ?></td>
                <td><?php echo $user['num_tel']; ?></td>
                <!-- Bouton pour éditer les données avec un lien vers updatedata.php -->
                <td><a href="modifier.php?id=<?php echo $user['id']; ?>">Edit</a></td>
                <!-- Bouton pour supprimer les données avec un lien vers deletedata.php -->
                <td><a href="sup.php?id=<?php echo $user['id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>