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
    // recuperation de l'id
    $id = $_GET['id'];
    // appel de la methode update
    $tache->update($id,$libele,$description,$date_echeance,$priorite,$etat);
    // Rediriger vers la page index
    header("location: read.php");
    exit(); // Terminer le script après la redirection
}
// Récupérer les données de l'étudiant à mettre à jour
$id = $_GET['id'];
if(isset($id)){
    try{
        // requete sql pour selectionner les taches
        $sql = "SELECT * FROM tache WHERE id = :id";
        $stmt=$connexion->prepare($sql);
        $stmt->bindparam(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            // recuperation des taches
            $tache = $stmt->fetch(PDO::FETCH_ASSOC);
            $libele = $tache['libele'];
            $description = $tache['description'];
            $date_echeance = $tache['date_echeance'];
            $priorite = $tache['priorite'];
            $etat = $tache['etat'];
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
        <a href="add_user.php">ADD USER</a> 
        <a href="read_user.php">LISTE USER</a> 
    </nav>
</header> 
<h1>MODIFIER UNE TACHE</h1>
<form action="" method="post">
    <fieldset>
        <div class="remplir">
            <label for="libele">quel est le libele de la tache?</label>
            <input type="text" name="libele" value=" <?php echo $libele?>">
        </div>
        <div class="remplir">
            <label for="description">quelle est la description  de la tache?</label>
            <input type="text" name="description" value=" <?php echo $description?>">
        </div>
        <div class="remplir">
            <label for="date_echeance">quel est la date d'echeance de la tache?</label>
            <input type="date" name="date_echeance" value=" <?php echo $date_echeance?>">
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
                <option value="a faire">a faire</option>
                <option value="en cours">en cours</option>
                <option value="terminee">terminee</option>
            </select>
        </div>
        <input type="submit" value="ajouter" name="ajouter" id="bouton">
    </form>
    </fieldset> 
</body>
</html>