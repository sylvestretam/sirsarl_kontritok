<?php

    class Activation_pv
    {
        public $activation_id;
        public $date_activation;
        public $valeur;
        public $point_de_vente;

        public $lignes_activations = [];
        public $total = 0;

        public function __construct()
        {
            $this->total = 0;
        }

        public function setLignesActivation($lignes)
        {
            foreach ($lignes as $ligne) {
                if( $ligne->activation_id == $this->activation_id){
                    $this->lignes_activations[] = $ligne;
                    $this->total = $this->total + $ligne->valeur;

                }
            }
        }
    }