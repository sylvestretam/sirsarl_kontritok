<?php
    class Sortie_magasin_pv
    {
        public $sortie_id;
        public $date_sortie;
        public $valeur_total = 0;
        public $observation;
        public $enreg_by;
        public $point_de_vente;
        public $magasin;
        public $uuid;

        public $quantite = 0;
        public $lignes_sorties = [];
        public function setLignes($lignes)
        {   
            
            foreach ($lignes as $ligne) {
                if( $ligne->sortie_pv == $this->sortie_id){
                    $this->lignes_sorties[] = $ligne;
                    $this->quantite = $this->quantite + $ligne->quantite;
                    $this->valeur_total = $this->valeur_total + $ligne->valeur;
                }
            }
        }

        public function Total()
        {
            return array_reduce($this->lignes_sorties,function($carry, $object){ return  $carry+($object->valeur);},0);
        }
    }