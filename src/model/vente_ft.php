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
        public $MD_name = "";

        public $lignes = [];
        public $quantite = 0;

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

        public function setMDName($mds)
        {
            foreach ($mds as $md) {
                if( $md->employee == $this->food_trucker){
                    $this->MD_name = $md->noms;
                }
            }
        }

    }