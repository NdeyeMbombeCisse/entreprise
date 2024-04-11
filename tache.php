<?php
class tache{
    private $connexion;
    private $libele;
    private $description;
    private $date_echeance;
    private $priorite;
    private $etat;

    public function __construct($connexion,$libele,$description,$date_echeance,$priorite, $etat){
        $this->connexion=$connexion;
        $this->libele=$libele;
        $this->description=$description;
        $this->date_echeance=$date_echeance;
        $this->priorite=$priorite;
        $this->etat=$etat;
    }
    // methode pour obtenir la valeur de la propriete libele
    public function getlibele(){
        return $this->libele;
    }
    // methode pour acceder a la valeur de la propriete libele
    public function setlibele($new_libele){
        $this->libele=$new_libele;

    }
    // methode pour obetenir la valeur de la description
    public function getdescription(){
        return $this->description;
    }
    // methode pour acceder a la valeur de la propriete description
    public function setdescription($new_description){
        $this->description=$new_description;
    }
    // methode pour obetenir la valeur de la date_echeance
    public function getdate_echeance(){
        return $this->date_echeance;
    }
    // methode pour acceder a la valeur de la propriete date_echeance
    public function setdate_echeance($new_date_echeance){
        $this->date_echeance=$new_date_echeance;
    }
    // methode pour obetenir la valeur de la priorite
    public function getpriorite(){
        return $this->priorite;
    }
    // methode pour acceder a la valeur de la propriete priorite
    public function setpriorite($new_priorite){
        $this->priorite=$new_priorite;
    }
    // methode pour obetenir la valeur de la etat
    public function getetat(){
        return $this->etat;
    }
    // methode pour acceder a la valeur de la propriete etat
    public function setetat($new_etat){
        $this->etat=$new_etat;
    }


    // methode pour ajouter des taches
    public function add($libele,$description,$date_echeance,$priorite,$etat){
        try{
            // la requete
            $sql="INSERT INTO tache (libele,description,date_echeance,priorite,etat) VALUES(:libele, :description, :date_echeance, :priorite, :etat)";
            // preparation de la requete
            $stmt= $this->connexion->prepare($sql);
            // liaison des variables aux valeurs
            $stmt->bindParam(':libele', $libele, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':date_echeance', $date_echeance, PDO::PARAM_STR);
            $stmt->bindParam(':priorite', $priorite, PDO::PARAM_STR);
            $stmt->bindParam(':etat', $etat, PDO::PARAM_STR);
            // execution de la requete
            $resultat = $stmt->execute();
            if($resultat){
                // direction vera la page ajouter des taches
                header("location: read.php");
            }else{
                die("Erreur: impossible d'inserer des données.");
            }
        }catch(PDOException $e){
            die("Erreur : impossible d'inserer des données " .$e->getMessage());
        }
    }

    // methode pour la lecture des taches ajoutees
    public function read(){
        try{
            // la requete
            $sql="SELECT * FROM tache";
            // preparation de la requete
            $stmt=$this->connexion->prepare($sql);
            // execution de la requete
            $resultat=$stmt->execute();
            // recuperation des elements sous forme de tableau
            $resultat=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch(PDOException $e) {
            die("Erreur: impossible d'afficher les éléments" .$e->getMessage());
        }
    }
    // methode pour la suppression
    public function delete($id){
        // requet pour la suppression
        $sql="DELETE FROM tache WHERE id= :id";
        // preparation de la re quet
        $stmt=$this->connexion->prepare($sql);
        // liaison de la variable id avec la valeur id
        $stmt->bindparam(':id', $id, PDO::PARAM_INT);
        // execution de la reqquet
        $resultat=$stmt->execute();
        if($resultat){
            // direction vera la page ajouter des taches
            header("location: read.php");
        }else{
            die("Erreur: impossible d'inserer des données.");
        }

    }
    
}
?>
