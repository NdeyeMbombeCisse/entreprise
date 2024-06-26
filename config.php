
<?php
include_once "tache.php";
include_once "users.php";

// création des constantes pour les informations de la base de données
define("DB_SERVER", "localhost");
define("USER_NAME", "root");
define("DB_PASSWORD", "Mbombe@78400$");
define("DB_NAME", "entreprise");

// connexion avec la base de données
try {
    $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, USER_NAME, DB_PASSWORD);
    // Configuration de PDO pour afficher les erreurs SQL
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tache = new Tache($connexion,"libele","description","date_echeance","priorite","etat");
    $user = new User($connexion,"libele","description","date_echeance","priorite","etat");
} 
// affichage d'un message en cas d'erreur
catch (PDOException $e) {
    die("Erreur :: Impossible de se connecter à la base de données : " . $e->getMessage());
}
