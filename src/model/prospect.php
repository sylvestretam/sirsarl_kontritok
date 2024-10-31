<?php
    require_once("src/model/commande_prospect.php");
    
    class Prospect
    {
        public $prospection_id;
        public $date_prospection;
        public $noms;
        public $contact;
        public $adresse ;
        public $nom_point_de_vente;
        public $type_point_de_pointe;
        public $observation;
        public $status;
        public $food_trucker;
        public $status_by;

        public $Commande;

        public function __construct()
        {
            $this->Commande = new Commande_prospect();
        }

        public function setCommande($commandes)
        {   
            
            
            foreach ($commandes as $commande) {
                if( $commande->prospect == $this->prospection_id){
                    $this->Commande = $commande;

                }
            }
        }
    }