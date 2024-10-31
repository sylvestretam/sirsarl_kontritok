<?php

    class Magasin
    {
        public $code;
        public $designation;
        public $localisation;
        public $receptions = [];
        public $sortiesFT = [];
        public $retoursFT = [];
        public $sortiesPV = [];
        public $retoursPV = [];

        public function setReceptions($receptions)
        {   
            
            foreach ($receptions as $reception) {
                if( $reception->magasin == $this->code){
                    $this->receptions[] = $reception;
                }
            }
        }

        public function setSortiesFT($receptions)
        {   
            
            foreach ($receptions as $reception) {
                if( $reception->magasin == $this->code){
                    $this->sortiesFT[] = $reception;
                }
            }
        }

        public function setRetoursFT($receptions)
        {   
            
            foreach ($receptions as $reception) {
                if( $reception->magasin == $this->code){
                    $this->retoursFT[] = $reception;
                }
            }
        }

        public function setSortiesPV($receptions)
        {   
            
            foreach ($receptions as $reception) {
                if( $reception->magasin == $this->code){
                    $this->sortiesPV[] = $reception;
                }
            }
        }

        public function setRetoursPV($receptions)
        {   
            
            foreach ($receptions as $reception) {
                if( $reception->magasin == $this->code){
                    $this->retoursPV[] = $reception;
                }
            }
        }


        public function TotalReception()
        {
            return array_reduce($this->receptions,function($carry, $object){ return  $carry+($object->Total());},0);
        }
        
        public function TotalSortiesPV()
        {
            return array_reduce($this->sortiesPV,function($carry, $object){ return  $carry+($object->Total());},0);
        }

        public function TotalSortiesFT()
        {
            return array_reduce($this->sortiesFT,function($carry, $object){ return  $carry+($object->Total());},0);
        }

        public function TotalRetourFT()
        {
            return array_reduce($this->retoursFT,function($carry, $object){ return  $carry+($object->Total());},0);
        }

        public function TotalRetourPV()
        {
            return array_reduce($this->retoursPV,function($carry, $object){ return  $carry+($object->Total());},0);
        }
    }