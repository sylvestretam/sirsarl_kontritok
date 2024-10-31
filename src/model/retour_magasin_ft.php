<?php

    class Retour_magasin_ft
    {
        public $retour_id ;
        public $date_retour ;
        public $valeur_total;
        public $observation;
        public $enreg_by;
        public $magasin;
        public $food_trucker;
        public $uuid;

        public $quantite = 0;
        public $lignes_retours = [];
        public function setLignes($lignes)
        {   
            
            foreach ($lignes as $ligne) {
                if( $ligne->retour_ft == $this->retour_id){
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