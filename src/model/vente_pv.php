<?php

    class Vente_pv
    {
        public $vente_id;
        public $date_vente;
        public $valeur_total = 0;
        public $observation;
        public $enreg_by;
        public $status;
        public $status_by;
        public $point_vente;

        public $lignes = [];
        public $quantite = 0;

        public function setLignes($lignes)
        {
            foreach ($lignes as $ligne) {
                if( $ligne->vente_pv == $this->vente_id){
                    $this->lignes[] = $ligne;
                    $this->valeur_total = $this->valeur_total + $ligne->valeur;
                    $this->quantite = $this->quantite + $ligne->quantite;
                }
            }
        }
    }