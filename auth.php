

<?php
// Inclure le fichier de configuration et la classe utilisateur
require_once "config.php";

// Vérifier si le formulaire de connexion est soumis
if(isset($_POST['email'], $_POST['mdp'])) {
    // Récupérer les valeurs soumises
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Appeler la méthode d'authentification
    if($user->authentifier($email, $mdp)) {
        // Démarrer une session
        session_start();
        // Stocker l'identifiant de l'utilisateur dans la session
        $_SESSION['user_id'] = $user->getIdByUsername($email);
        // Rediriger vers la page de tableau de bord
        header("location: create.php");
        exit();
    } else {
        // Rediriger vers la page de connexion avec un message d'erreur
        header("location: add_user.php?error=1");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Authentification</title>
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
<h1>AUTHENTIFICATION</h1>
<form action="" method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="mdp" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>
</body>
</html>
