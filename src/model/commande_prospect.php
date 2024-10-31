<?php

    class Commande_prospect
    {
        public $commande_id;
        public $date_livraison;
        public $prospect;

        public $lignes_commande = [];
        public $total = 0;

        public function __construct()
        {
            $this->total = 0;
        }

        public function setLignesCommande($lignes)
        {
            foreach ($lignes as $ligne) {
                if( $ligne->commande_id == $this->commande_id){
                    $this->lignes_commande[] = $ligne;
                    $this->total = $this->total + $ligne->valeur;

                }
            }
        }
    }