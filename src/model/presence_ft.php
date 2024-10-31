<?php

    class Presence_ft
    {
        public $date_jour;
        public $observation;

        public $lignes = [];
        public $presents = [];
        public $absents = [];

        public function setLignes($lignes)
        {   
            
            foreach ($lignes as $ligne) {
                if( $ligne->date_presence == $this->date_jour){
                    $this->lignes[] = $ligne;
                    if($ligne->status == 'PRESENT')
                        $this->presents[] = $ligne;
                    else
                        $this->absents[] = $ligne;
                }
            }
        }
    }