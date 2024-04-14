<?php
class User {
    private $connexion;
    private $prenom;
    private $nom;
    private $email;
    private $mdp;
    private $num_tel;

    public function __construct($connexion, $prenom, $nom, $email, $mdp, $num_tel) {
        $this->connexion = $connexion;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->num_tel = $num_tel;
    }

    public function getprenom() {
        return $this->prenom;
    }
    
    public function setprenom($new_prenom) {
        $this->prenom = $new_prenom;
    }

    public function getnom() {
        return $this->nom;
    }
    
    public function setnom($new_nom) {
        $this->nom = $new_nom;
    }

    public function getemail() {
        return $this->email;
    }
    
    public function setemail($new_email) {
        $this->email = $new_email;
    }

    public function getmdp() {
        return $this->mdp;
    }
    
    public function setmdp($new_mdp) {
        $this->mdp = $new_mdp;
    }

    public function getnum_tel() {
        return $this->num_tel;
    }
    
    public function setnum_tel($new_num_tel) {
        $this->num_tel = $new_num_tel;
    }

    public function modifier($id, $prenom, $nom, $email, $mdp, $num_tel) {
        try {
            $sql = "UPDATE employer SET prenom = :prenom, nom = :nom, email = :email, mdp = :mdp, num_tel = :num_tel WHERE id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR);
            $stmt->bindParam(':num_tel', $num_tel, PDO::PARAM_STR);
            $resultat = $stmt->execute();
            if ($resultat) {
                header("location: read_user.php");
            } else {
                die("Erreur: problème lié à l'exécution de la requête");
            }
        } catch (PDOException $e) {
            die("Erreur: impossible de modifier les données de l'utilisateur " . $e->getMessage());
        }
    }

    // methode pour la suppression
    public function sup($id){
        // requet pour la suppression
        $sql="DELETE FROM employer WHERE id= :id";
        // preparation de la re quet
        $stmt=$this->connexion->prepare($sql);
        // liaison de la variable id avec la valeur id
        $stmt->bindparam(':id', $id, PDO::PARAM_INT);
        // execution de la reqquet
        $resultat=$stmt->execute();
        if($resultat){
            // direction vera la page ajouter des taches
            header("location: read_user.php");
        }else{
            die("Erreur: impossible d'inserer des données.");
        }
    }

    public function ajouter($prenom, $nom, $email, $mdp, $num_tel) {
        try {
            $sql = "INSERT INTO employer(prenom, nom, email, mdp, num_tel) VALUES(:prenom, :nom, :email, :mdp, :num_tel)";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR);
            $stmt->bindParam(':num_tel', $num_tel, PDO::PARAM_STR);
            $resultat = $stmt->execute();
            if ($resultat) {
                header("location: read_user.php");
            } else {
                die("Erreur: problème lié à l'exécution");
            }
        } catch (PDOException $e) {
            die("Erreur: problème lors de l'ajout " . $e->getMessage());
        }
    }

    public function read_user() {
        try {
            $sql = "SELECT * FROM employer";
            $stmt = $this->connexion->prepare($sql);
            $resultat = $stmt->execute();
            $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            die("Erreur lors de la lecture " . $e->getMessage());
        }
    }

    
    public function authentifier($email, $mdp) {
        try {
            $sql = "SELECT * FROM employer WHERE email = :email AND mdp = :mdp";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR);
            $stmt->execute();
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                // Authentification réussie
                // Vous pouvez stocker les informations de l'utilisateur dans une session par exemple
                session_start();
                $_SESSION['user_id'] = $resultat['id'];
                $_SESSION['user_email'] = $resultat['email'];
                return true;
            } else {
                // Authentification échouée
                return false;
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            die("Erreur lors de l'authentification " . $e->getMessage());
        }
    }

    public function getIdByUsername($email) {
        try {
            $sql = "SELECT id FROM employer WHERE  email = :email";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['id'];
            } else {
                return null; // L'utilisateur n'existe pas
            }
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
    
}
?>
