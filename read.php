<?php
// inclure le fichier de configuration
require_once "config.php";
// Récupérer les données des taches depuis la base de données
$resultat = $tache->read();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des taches</title>
    <link rel="stylesheet" href="style.css">  
</head>
<body>
<header>
    <nav>
    <a href="create.php">ADD TACHES</a>
        <a href="read.php">LISTE_TACHES</a> 
    </nav>
  </header> 
  <h1>LISTE DES TACHES</h1>
<table>
<thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">LIBELE</th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">DATE_ECEANCE</th>
            <th scope="col">PRIORITE</th>
            <th scope="col">ETAT</th>
            <th scope="col">MODIFIER</th>
            <th scope="col">SUPPRIMER</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($resultat as $tache) { ?>
            <!-- Affichage des données dans les lignes du tableau -->
            <tr class="trow">
                <td><?php echo $tache['id']; ?></td>
                <td><?php echo $tache['libele']; ?></td>
                <td><?php echo $tache['description']; ?></td>
                <td><?php echo $tache['date_echeance']; ?></td>
                <td><?php echo $tache['priorite']; ?></td>
                <td><?php echo $tache['etat']; ?></td>
                <!-- Bouton pour éditer les données avec un lien vers updatedata.php -->
                <td><a href="update.php?id=<?php echo $tache['id']; ?>">Edit</a></td>
                <!-- Bouton pour supprimer les données avec un lien vers deletedata.php -->
                <td><a href="delete.php?id=<?php echo $tache['id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>