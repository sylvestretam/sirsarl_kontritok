<?php

    class Point_de_vente
    {
        public $code_pv;
        public $nom;
        public $description;
        public $localisation;
        public $type;
        public $status;
        public $status_by;
        public $prospect;

        public $Prospect;
        public $activation;

        public $sorties = [];
        public $qte_sorties = 0;
        public $valeur_sorties = 0;

        public $ventes = [];
        public $qte_ventes = 0;
        public $valeur_ventes = 0;

        public function __construct()
        {
            $this->Prospect = new Prospect();
        }

        public function setProspect($prospects)
        {
            foreach ($prospects as $prospect) {
                if( $prospect->prospection_id == $this->prospect){
                    $this->Prospect = $prospect;
                }
            }
        }

        public function setActivation($activations)
        {
            foreach ($activations as $activation) {
                if( $activation->point_de_vente == $this->code_pv){
                    $this->activation = $activation;
                }
            }
        }

        public function setSorties($sorties)
        {
            foreach ($sorties as $sortie) {
                if( $sortie->point_de_vente == $this->code_pv){
                    $this->sorties[] = $sortie;
                    $this->qte_sorties = $this->qte_sorties + $sortie->quantite;
                    $this->valeur_sorties = $this->valeur_sorties + $sortie->valeur_total;
                }
            }
        }

        public function setVentes($ventes)
        {
            foreach ($ventes as $vente) {
                if( $vente->point_vente == $this->code_pv){
                    $this->ventes[] = $vente;
                    $this->qte_ventes = $this->qte_ventes + $vente->quantite;
                    $this->valeur_ventes = $this->valeur_ventes + $vente->valeur_total;
                }
            }
        }

    }