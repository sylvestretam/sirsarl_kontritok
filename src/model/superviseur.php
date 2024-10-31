<?php

    class Superviseur
    {
        public $employee;
        public $noms;
        public $target_vente;
        public $target_prospection;
        public $Employee;

        public $prospects = [];
        public $convertis = [];
        public $rapports = [];
        public $ventes = [];

        public function setEmployee($employees)
        {
            foreach ($employees as $employee) {
                if( $employee->matricule == $this->employee){
                    $this->Employee = $employee;

                }
            }
        }

        public function setProspects($prospects)
        {
            foreach ($prospects as $prospect) {
                if( $prospect->food_trucker == $this->employee){
                    $this->prospects[] = $prospect;
                    if( $prospect->status == "CONVERTI")
                        $this->convertis[] = $prospect;

                }
            }
        }

        public function setRapports($rapports)
        {
            foreach ($rapports as $rapport) {
                if( $rapport->food_trucker == $this->employee){
                    $this->rapports[] = $rapport;

                }
            }
        }

        public $total_vente = 0;
        public $quantite_vente = 0;
        public function setVentes($ventes)
        {
            foreach ($ventes as $vente) {
                if( $vente->food_trucker == $this->employee){
                    $this->ventes[] = $vente;
                    $this->total_vente = $this->total_vente + $vente->valeur_total;
                    $this->quantite_vente = $this->quantite_vente + $vente->quantite;
                }
            }
        }

    }