<?php

// définition de la classe
class Compte {
    private string $libelle;
    private float $solde;
    private string $devise;
    private Titulaire $titulaire;


    // constructeur 
    public function __construct($libelle, $solde, $devise, Titulaire $titulaire){
        $this->libelle = $libelle;
        $this->solde = $solde;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $titulaire->addCompte($this); // ajoute ce compte que nous construisons à ce titulaire
    }

        // getter / setter
        public function getLibelle(){
            return $this->libelle;
        }

        public function setLibelle($libelle){
            $this->libelle = $libelle;
        }

        public function getSolde(){
            return $this->solde;
        }

        public function setSolde($solde){
            $this->solde = $solde;
        }
        public function getDevise(){
            return $this->devise;
        }

        public function setDevise($devise){
            $this->devise = $devise;
        }

        // methodes
        // fonction pour afficher les infos du compte
        public function __toString(){
            return "Libellé : " . $this->getLibelle() . "<br/> Solde : " . $this->getSolde() . "<br/> Devise : " . $this->getDevise() . "<br/>";
         }

         // fonction pour créditer le compte de X euros
         public function crediter($montant){
            $this->solde += $montant;
            echo "Après crédit de " . $montant . "€ sur le " . $this->getLibelle() . " appartenant à " . $this->titulaire->getNom() . " " . $this->titulaire->getPrenom() . " le solde est de : " . $this->getSolde() . "€ <br/>";
         }

         // fonction pour débiter le compte de X euros
         public function debiter($montant){
            if($this->solde >= $montant){
                $this->solde -= $montant;
                echo "Après débit de " . $montant . "€ sur le compte " . $this->getLibelle() . " appartenant à " . $this->titulaire . " le solde est de : " . $this->getSolde() . "€ <br/>";
                return true;
            } else {
                echo "Il ne reste pas suffisament d'argent sur le compte pour effecter un débit.";
                return false;
            }
         }

         // fonction pour effectuer un virement d'un compte à un autre
         public function virement($montant, Compte $compteDestinataire){
            $isDebiterOk = $this->debiter($montant);
            if($isDebiterOk){
                $compteDestinataire->crediter($montant);
                echo "Le virement d'un montant de : " . $montant . "€ du compte : " . $this->getLibelle() . " vers le compte " . $compteDestinataire . " a été éffectué. <br/>";
            }

         }


}




?>