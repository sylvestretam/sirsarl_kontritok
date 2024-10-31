<?php

    class Reception_magasin
    {
        public $reception_id;
        public $date_reception;
        public $magasin;
        public $uuid;

        public $lignes_receptions = [];
        public $quantite = 0;
        public function setLignes($lignes)
        {   
            
            foreach ($lignes as $ligne) {
                if( $ligne->reception == $this->reception_id){
                    $this->lignes_receptions[] = $ligne;
                    $this->quantite = $this->quantite + $ligne->quantite;
                }
            }
        }

        public function Total()
        {
            return array_reduce($this->lignes_receptions,function($carry, $object){ return  $carry+($object->valeur);},0);
        }
    }