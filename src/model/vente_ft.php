<?php

    class Vente_ft
    {
        public $vente_id;
        public $date_vente;
        public $valeur_total = 0;
        public $observation;
        public $enreg_by;
        public $status;
        public $status_by;
        public $food_trucker;

        public $lignes = [];
        public $quantite;

        public function setLignes($lignes)
        {
            foreach ($lignes as $ligne) {
                if( $ligne->vente_ft == $this->vente_id){
                    $this->lignes[] = $ligne;
                    $this->valeur_total = $this->valeur_total + $ligne->valeur;
                    $this->quantite = $this->quantite + $ligne->quantite;
                }
            }
        }
    }