<?php

    require_once("src/repository/magasin.php");
    require_once("src/repository/article.php");
    require_once("src/repository/unite_stock.php");
    require_once("src/repository/market_develloper.php");
    require_once("src/repository/superviseur.php");
    require_once("src/repository/point_de_vente.php");

    require_once("src/repository/reception_magasin.php");
    require_once("src/repository/ligne_reception_magasin.php");

    require_once("src/repository/sortie_magasin_ft.php");
    require_once("src/repository/ligne_sortie_ft.php");
    require_once("src/repository/retour_magasin_ft.php");
    require_once("src/repository/ligne_retour_ft.php");

    require_once("src/repository/sortie_magasin_pv.php");
    require_once("src/repository/ligne_sortie_pv.php");
    require_once("src/repository/retour_magasin_pv.php");
    require_once("src/repository/ligne_retour_pv.php");

    require_once("src/repository/stock_magasin.php");

    require_once("src/repository/unite_article.php");

    class DashboardController{

        private $dbconnect;

        private $repoMagasin;
        private $repoArticle;
        private $repoUnite;
        private $repoFT;
        private $repoPV;

        private $repoReception;
        private $repoLigneReception;
        private $repoSortiepv;
        private $repoLigneSortiepv;
        private $repoSortieft;
        private $repoLigneSortieft;

        private $repoRetourft;
        private $repoLigneRetourft;
        private $repoRetourpv;
        private $repoLigneRetourpv;

        private $repoStockMagsin;

        private $magasins = [];
        private $receptions = [];
        private $lignes_receptions = [];
        private $sortiesft = [];
        private $lignes_sortiesft = [];
        private $retoursft = [];
        private $lignes_retoursft = [];
        private $sortiespv = [];
        private $lignes_sortiespv = [];
        private $retourspv = [];
        private $lignes_retourspv = [];
        private $stock = [];

        public function __construct()
        {
            $this->dbconnect = new DbConnect();
            $this->repoMagasin = new MagasinRepository($this->dbconnect);
            $this->repoArticle = new ArticleRepository($this->dbconnect);
            $this->repoUnite = new Unite_stockRepository($this->dbconnect);
            $this->repoFT = new MarketDevelloperRepository($this->dbconnect);
            $this->repoPV = new Point_de_venteRepository($this->dbconnect);

            $this->repoReception = new Reception_magasinRepository($this->dbconnect);
            $this->repoLigneReception = new Ligne_reception_magasinRepository($this->dbconnect);
            $this->repoSortiepv = new Sortie_magasin_pvRepository($this->dbconnect);
            $this->repoLigneSortiepv = new Ligne_sortie_pvRepository($this->dbconnect);
            $this->repoSortieft = new Sortie_magasin_ftRepository($this->dbconnect);
            $this->repoLigneSortieft = new Ligne_sortie_ftRepository($this->dbconnect);
            
            $this->repoRetourft = new Retour_magasin_ftRepository($this->dbconnect);
            $this->repoLigneRetourft = new Ligne_retour_ftRepository($this->dbconnect);

            $this->repoRetourpv = new Retour_magasin_pvRepository($this->dbconnect);
            $this->repoLigneRetourpv = new Ligne_retour_pvRepository($this->dbconnect);

            $this->repoStockMagsin = new Stock_magasinRepository($this->dbconnect);

            $this->init();
            
        }

        public function show()
        {

            $magasins = $this->magasins;
            $receptions = $this->receptions;
            $sortiesft = $this->sortiesft;
            $retoursft = $this->retoursft;
            $sortiespv = $this->sortiespv;
            $retourspv = $this->retourspv;
            $stock = $this->stock;

            $articles = $this->repoArticle->getAll();
            $unites_stocks = $this->repoUnite->getAll();
            $fts = $this->repoFT->getAll();
            $pvs = $this->repoPV->getAll();

            $TotalReception = array_reduce($this->receptions,function($carry, $object){ return  $carry+($object->quantite);},0);
            $TotalSortieFT = array_reduce($this->sortiesft,function($carry, $object){ return  $carry+($object->quantite);},0);
            $TotalSortiePV = array_reduce($this->sortiespv,function($carry, $object){ return  $carry+($object->quantite);},0);
            $TotalRetourFT = array_reduce($this->retoursft,function($carry, $object){ return  $carry+($object->quantite);},0);
            $TotalRetourPV = array_reduce($this->retourspv,function($carry, $object){ return  $carry+($object->quantite);},0);

            require("template/dashboard.php");
        }  

        public function init()
        {
            $this->magasins = $this->repoMagasin->getAll();
            $this->receptions = $this->repoReception->getAll();
            $this->lignes_receptions = $this->repoLigneReception->getAll();
            $this->sortiesft = $this->repoSortieft->getAll();
            $this->lignes_sortiesft = $this->repoLigneSortieft->getAll();
            $this->retoursft = $this->repoRetourft->getAll();
            $this->lignes_retoursft = $this->repoLigneRetourft->getAll();
            $this->sortiespv = $this->repoSortiepv->getAll();
            $this->lignes_sortiespv = $this->repoLigneSortiepv->getAll();
            $this->retourspv = $this->repoRetourpv->getAll();
            $this->lignes_retourspv = $this->repoLigneRetourpv->getAll();
            $this->stock = $this->repoStockMagsin->getAll();

            array_map(function($object){$object->setLignes($this->lignes_receptions);},$this->receptions);
            array_map(function($object){$object->setReceptions($this->receptions);},$this->magasins);

            array_map(function($object){$object->setLignes($this->lignes_sortiesft);},$this->sortiesft);
            array_map(function($object){$object->setSortiesFT($this->sortiesft);},$this->magasins);

            array_map(function($object){$object->setLignes($this->lignes_retoursft);},$this->retoursft);
            array_map(function($object){$object->setRetoursFT($this->retoursft);},$this->magasins);

            array_map(function($object){$object->setLignes($this->lignes_sortiespv);},$this->sortiespv);
            array_map(function($object){$object->setSortiesPV($this->sortiespv);},$this->magasins);

            array_map(function($object){$object->setLignes($this->lignes_retourspv);},$this->retourspv);
            array_map(function($object){$object->setRetoursPV($this->retourspv);},$this->magasins);
        }
    }