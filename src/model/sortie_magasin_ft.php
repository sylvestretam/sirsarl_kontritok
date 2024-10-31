<?php
    class Sortie_magasin_ft
    {
        public $sortie_id;
        public $date_sortie;
        public $valeur_total;
        public $observation;
        public $enreg_by;
        public $food_trucker;
        public $magasin;
        public $uuid;

        public $quantite = 0;
        public $lignes_sorties = [];
        public function setLignes($lignes)
        {   
            
            foreach ($lignes as $ligne) {
                if( $ligne->sortie_ft == $this->sortie_id){
                    $this->lignes_sorties[] = $ligne;
                    $this->quantite = $this->quantite + $ligne->quantite;
                }
            }
        }

        public function Total()
        {
            return array_reduce($this->lignes_sorties,function($carry, $object){ return  $carry+($object->valeur);},0);
        }
    }