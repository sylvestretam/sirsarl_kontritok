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

    class MagasinController{

        private $dbconnect;

        private $repoMagasin;
        private $repoArticle;
        private $repoUnite;
        private $repoFT;
        private $repoPV;
        private $repoSuperviseur;
        private $repoUniteArticle;

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
        private $unites_articles = [];

        public function __construct()
        {
            $this->dbconnect = new DbConnect();
            $this->repoMagasin = new MagasinRepository($this->dbconnect);
            $this->repoArticle = new ArticleRepository($this->dbconnect);
            $this->repoUnite = new Unite_stockRepository($this->dbconnect);
            $this->repoFT = new MarketDevelloperRepository($this->dbconnect);
            $this->repoPV = new Point_de_venteRepository($this->dbconnect);
            $this->repoSuperviseur = new SuperviseurRepository($this->dbconnect);

            
            $this->repoUniteArticle = new Unite_articleRepository($this->dbconnect);

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

            $this->subactions();

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
            $superviseurs = $this->repoSuperviseur->getAll();

            $unites_articles =$this->unites_articles;

            $TotalReception = array_reduce($this->receptions,function($carry, $object){ return  $carry+($object->quantite);},0);
            $TotalSortieFT = array_reduce($this->sortiesft,function($carry, $object){ return  $carry+($object->quantite);},0);
            $TotalSortiePV = array_reduce($this->sortiespv,function($carry, $object){ return  $carry+($object->quantite);},0);
            $TotalRetourFT = array_reduce($this->retoursft,function($carry, $object){ return  $carry+($object->quantite);},0);
            $TotalRetourPV = array_reduce($this->retourspv,function($carry, $object){ return  $carry+($object->quantite);},0);

            require("template/magasin.php");
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

            $this->unites_articles = $this->repoUniteArticle->getAll();

            array_map(function($object){$object->setLignesSorties($this->lignes_sortiesft);},$this->unites_articles);
            array_map(function($object){$object->setLignesSorties($this->lignes_sortiespv);},$this->unites_articles);

            array_map(function($object){$object->setLignesReceptions($this->lignes_receptions);},$this->unites_articles);
            array_map(function($object){$object->setStock($this->stock);},$this->unites_articles);

            array_map(function($object){$object->setLignesRetours($this->lignes_retoursft);},$this->unites_articles);
            array_map(function($object){$object->setLignesRetours($this->lignes_retourspv);},$this->unites_articles);




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

        public function subactions()
        {
            if(isset($_REQUEST['subaction'])){

                switch ($_REQUEST['subaction']) {
    
                    case 'saveReception':
                        $this->saveReception();
                        break;
                    case 'deleteReception':
                        $this->deleteReception();
                        break;
                    case 'saveSortieMD':
                        $this->saveSortieMD();
                        break;
                    case 'deleteSortieFT':
                        $this->deleteSortieFT();
                        break;
                    case 'saveSortiePV':
                        $this->saveSortiePV();
                        break;
                    case 'deleteSortiePV':
                        $this->deleteSortiePV();
                        break;
                    case 'saveRetourFT':
                        $this->saveRetourFT();
                        break;
                    case 'deleteRetourFT':
                        $this->deleteRetourFT();
                        break;
                    case 'saveRetourPV':
                        $this->saveRetourPV();
                        break;
                    case 'deleteRetourPV':
                        $this->deleteRetourPV();
                        break;
                    default:
                        break;
                }
            }
        }

        public function saveReception()
        {
            $reception = new Reception_magasin();
            $reception->date_reception = $_REQUEST['date_reception'];
            $reception->magasin = $_REQUEST['magasin'];
            $reception->reception_id = uniqid('rec_');

            $reception = $this->repoReception->save($reception);

            $this->save_ligne_reception($reception);
        }

        public function save_ligne_reception($reception)
        {
            if(!empty( $_REQUEST['ligne_reception'] )){
                $Lignes = json_decode($_REQUEST['ligne_reception']);

                foreach ($Lignes as $key => $value) 
                {
                    $ligne = new Ligne_reception_magasin();
                    $ligne->article = $key;
                    $ligne->quantite = $value->quantite;
                    $ligne->unite = $value->unite;
                    $ligne->valeur = $value->valeur;
                    $ligne->reception = $reception->reception_id;

                    $this->repoLigneReception->save($ligne);
                }
            }
        }

        public function deleteReception()
        {
            $reception = new Reception_magasin();
            $reception->reception_id = $_REQUEST['reception_id'];

            $reception = $this->repoReception->delete($reception);
        }

        public function saveSortieMD()
        {
            $sortie = new Sortie_magasin_ft();
            $sortie->date_sortie = $_REQUEST['date_sortie'];
            $sortie->magasin = $_REQUEST['magasin'];
            $sortie->food_trucker = $_REQUEST['superviseur'];
            $sortie->enreg_by = $_SESSION['matricule'];
            $sortie->sortie_id = uniqid('Ssup_');

            $sortie = $this->repoSortieft->save($sortie);

            $this->save_ligne_sortie_md($sortie);
        }

        public function save_ligne_sortie_md($sortie)
        {
            if(!empty( $_REQUEST['ligne_sortieft'] )){
                $Lignes = json_decode($_REQUEST['ligne_sortieft']);

                foreach ($Lignes as $key => $value) 
                {
                    $ligne = new Ligne_sortie_ft();
                    $ligne->article = $key;
                    $ligne->quantite = $value->quantite;
                    $ligne->unite = $value->unite;
                    $ligne->valeur = $value->valeur;
                    $ligne->sortie_ft = $sortie->sortie_id;

                    $this->repoLigneSortieft->save($ligne);
                }
            }
        }

        public function deleteSortieFT()
        {
            $sortie = new Sortie_magasin_ft();
            $sortie->sortie_id = $_REQUEST['sortie_id'];

            $reception = $this->repoSortieft->delete($sortie);
        }

        public function saveSortiePV()
        {
            $sortie = new Sortie_magasin_pv();
            $sortie->date_sortie = $_REQUEST['date_sortie'];
            $sortie->magasin = $_REQUEST['magasin'];
            $sortie->point_de_vente = $_REQUEST['point_de_vente'];
            $sortie->enreg_by = $_SESSION['matricule'];
            $sortie->sortie_id = uniqid('spv_');

            $sortie = $this->repoSortiepv->save($sortie);

            $this->save_ligne_sortie_pv($sortie);
        }

        public function save_ligne_sortie_pv($sortie)
        {
            if(!empty( $_REQUEST['ligne_sortiepv'] )){
                $Lignes = json_decode($_REQUEST['ligne_sortiepv']);

                foreach ($Lignes as $key => $value) 
                {
                    $ligne = new Ligne_sortie_pv();
                    $ligne->article = $key;
                    $ligne->quantite = $value->quantite;
                    $ligne->unite = $value->unite;
                    $ligne->valeur = $value->valeur;
                    $ligne->sortie_pv = $sortie->sortie_id;

                    $this->repoLigneSortiepv->save($ligne);
                }
            }
        }

        public function deleteSortiePV()
        {
            $sortie = new Sortie_magasin_ft();
            $sortie->sortie_id = $_REQUEST['sortiepv_id'];

            $this->repoSortiepv->delete($sortie);
        }

        public function saveRetourFT()
        {
            $retour = new Retour_magasin_ft();
            $retour->date_retour = $_REQUEST['date_retour'];
            $retour->magasin = $_REQUEST['magasin'];
            $retour->food_trucker = $_REQUEST['food_trucker'];
            $retour->enreg_by = $_SESSION['matricule'];
            $retour->retour_id = uniqid('Rft_');

            $retour = $this->repoRetourft->save($retour);

            $this->save_ligne_retour_ft($retour);
        }

        public function save_ligne_retour_ft($retour)
        {
            if(!empty( $_REQUEST['ligne_retourft'] )){
                $Lignes = json_decode($_REQUEST['ligne_retourft']);

                foreach ($Lignes as $key => $value) 
                {
                    $ligne = new Ligne_retour_ft();
                    $ligne->article = $key;
                    $ligne->quantite = $value->quantite;
                    $ligne->unite = $value->unite;
                    $ligne->valeur = $value->valeur;
                    $ligne->retour_ft = $retour->retour_id;

                    $this->repoLigneRetourft->save($ligne);
                }
            }
        }
        public function deleteRetourFT()
        {
            $retour = new Retour_magasin_ft();
            $retour->retour_id = $_REQUEST['retour_id'];

            $reception = $this->repoRetourft->delete($retour);
        }

        public function saveRetourPV()
        {
            $retour = new Retour_magasin_pv();
            $retour->date_retour = $_REQUEST['date_retour'];
            $retour->magasin = $_REQUEST['magasin'];
            $retour->point_de_vente = $_REQUEST['point_de_vente'];
            $retour->enreg_by = $_SESSION['matricule'];
            $retour->retour_id = uniqid('Rpv_');

            $retour = $this->repoRetourpv->save($retour);

            $this->save_ligne_retour_pv($retour);
        }
        
        public function save_ligne_retour_pv($retour)
        {
            if(!empty( $_REQUEST['ligne_retourpv'] )){
                $Lignes = json_decode($_REQUEST['ligne_retourpv']);

                foreach ($Lignes as $key => $value) 
                {
                    $ligne = new Ligne_retour_pv();
                    $ligne->article = $key;
                    $ligne->quantite = $value->quantite;
                    $ligne->unite = $value->unite;
                    $ligne->valeur = $value->valeur;
                    $ligne->retour_pv = $retour->retour_id;

                    $this->repoLigneRetourpv->save($ligne);
                }
            }
        }
        public function deleteRetourPV()
        {
            $retour = new Retour_magasin_pv();
            $retour->retour_id = $_REQUEST['retour_id'];

            $reception = $this->repoRetourpv->delete($retour);
        }

    }