<?php

// définition de la classe
class Titulaire {
    private string $nom;
    private string $prenom;
    private DateTime $dateNaissance;
    private string $ville;
    private array $comptes;


    // constructeur 
    public function __construct($nom, $prenom, $dateNaissanceString, $ville){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = new DateTime($dateNaissanceString); // on présise String pour comprendre qu'on attend un string qui sera ensuite convertit en date
        $this->ville = $ville;
        $this->comptes = [];
    }

     // getter / setter
     public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getDateNaissance(){
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissanceString){
        $this->dateNaissance = new DateTime($dateNaissanceString); //  le new demande une instance de la classe DateTime, on donne comme argument/paramètre le string, qui sera passé au constructeur de la classe DateTime
    }
    public function getVille(){
        return $this->ville;
    }

    public function setVille($ville){
        $this->ville = $ville;
    }

    // methodes

    // fonction pour calculer l'age
    public function getAge(){
        $now = new DateTime();
        $age = $now->diff($this->getDateNaissance())->format("%Y");
        return $age;
    }
  

    //fonction pour ajouter un compte
    public function addCompte(Compte $compte){ 
        $this->comptes[] = $compte;
   }


   // fonction pour afficher le titulaire
   public function afficherTitulaire(){
        echo "<br/> Coordonnées du titulaire : <br/> Nom : " . $this->getNom() . " <br/> Prénom : " . $this->getPrenom() . "<br/> Ville : " . $this->getVille().' <br/> Date de naissance : ' . $this->dateNaissance->format("d/m/Y") . " (" .$this->getAge() . " ans) <br/>";
   }

    // fonction to string

    public function __toString(){
        return $this->getNom() . " " . $this->getPrenom();
    }

    // fonction pour afficher les comptes
    public function afficherComptes(){
        echo "Ensemble des comptes de " . $this->getNom() . " " . $this->getPrenom() . ": <br/>";
        foreach($this->comptes as $compte){
            echo $compte;
        }
    }



}

?>