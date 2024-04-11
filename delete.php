<?php
// inclure le fichier de la configuration
require_once "config.php";
// Vérifier si l'ID du membre à supprimer est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'ID du membre à supprimer depuis l'URL
    $id= $_GET['id'];
    // Appeler la méthode delete() pour supprimer le membre
    $tache->delete($id);
} else {
    // Rediriger vers la page index si l'ID n'est pas spécifié
    header("location: read.php");
    exit(); // Arrêt du script après la redirection
}
?>