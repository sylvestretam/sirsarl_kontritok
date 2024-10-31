<?php

    class Ligne_presence_ft
    {
        public $date_presence;
        public $food_trucker;
        public $status;

        public $Food_Trucker;
        public function setFT($fts)
        {   
            
            foreach ($fts as $ft) {
                if( $ft->employee == $this->food_trucker){
                    $this->Food_Trucker = $ft;
                }
            }
        }
    }