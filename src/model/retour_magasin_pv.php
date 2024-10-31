<?php

    class Retour_magasin_pv
    {
        public $retour_id;
        public $date_retour;
        public $valeur_total;
        public $observation;
        public $enreg_by;
        public $point_de_vente;
        public $magasin;
        public $uuid;

        public $quantite = 0;
        public $lignes_retours = [];
        public function setLignes($lignes)
        {   
            
            foreach ($lignes as $ligne) {
                if( $ligne->retour_pv == $this->retour_id){
                    $this->lignes_retours[] = $ligne;
                    $this->quantite = $this->quantite + $ligne->quantite;
                }
            }
        }

        public function Total()
        {
            return array_reduce($this->lignes_retours,function($carry, $object){ return  $carry+($object->valeur);},0);
        }
    }