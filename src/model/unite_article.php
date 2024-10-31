<?php

    class Unite_article
    {
        public $article;
        public $unite;

        public $qte_sortie = 0;
        public $lignes_sorties = [];

        public function setLignesSorties($lignes)
        {
            foreach ($lignes as $ligne) {
                if( $ligne->article == $this->article && $ligne->unite == $this->unite ){
                    $this->lignes_sorties[] = $ligne;
                    $this->qte_sortie = $this->qte_sortie + $ligne->quantite;

                }
            }
        }

        public $qte_reception = 0;
        public $lignes_receptions = [];

        public function setLignesReceptions($lignes)
        {
            foreach ($lignes as $ligne) {
                if( $ligne->article == $this->article && $ligne->unite == $this->unite ){
                    $this->lignes_receptions[] = $ligne;
                    $this->qte_reception = $this->qte_reception + $ligne->quantite;

                }
            }
        }

        public $qte_retour = 0;
        public $lignes_retours = [];

        public function setLignesRetours($lignes)
        {
            foreach ($lignes as $ligne) {
                if( $ligne->article == $this->article && $ligne->unite == $this->unite ){
                    $this->lignes_retours[] = $ligne;
                    $this->qte_retour = $this->qte_retour + $ligne->quantite;

                }
            }
        }

        public $qte_stock = 0;

        public function setStock($stocks)
        {
            foreach ($stocks as $stock) {
                if( $stock->article == $this->article && $stock->unite == $this->unite ){
                    $this->qte_stock = $stock->quantite;
                }
            }
        }
    }