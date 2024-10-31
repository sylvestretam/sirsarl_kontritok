<?php
    require_once("src/repository/food_trucker.php");
    require_once("src/repository/article.php");
    require_once("src/repository/unite_stock.php");
    require_once("src/repository/vente_pv.php");
    require_once("src/repository/ligne_vente_pv.php");
    require_once("src/repository/unite_article.php");

    class VentePVController{

        private $dbconnect;
        
        private $repoVentePV;
        private $repoLigne_ventePV;
        private $repoPV;
        private $repoSortiepv;
        private $repoLigneSortiepv;
        private $repoArticle;
        private $repoUnite;

        private $pvs = [];
        private $pv;
        private $sortiespv = [];
        private $lignes_sortiespv = [];
        private $ventespv = [];
        private $lignes_ventespv = [];

        public function __construct()
        {
            $this->dbconnect = new DbConnect();

            $this->repoPV = new Point_de_venteRepository($this->dbconnect);
            $this->repoVentePV = new Vente_pvRepository($this->dbconnect);
            $this->repoLigne_ventePV = new Ligne_vente_pvRepository($this->dbconnect);

            $this->repoArticle = new ArticleRepository($this->dbconnect);
            $this->repoUnite = new Unite_stockRepository($this->dbconnect);

            $this->subactions();
            $this->init();
        }

        public function show()
        {
            $pvs = $this->pvs;
            $sortiespv = $this->sortiespv;
            $ventespv = $this->ventespv;

            $TotalVente = array_reduce($this->ventespv,function($carry, $object){ return  $carry+($object->valeur_total);},0);
            $NbreVente = sizeof($this->ventespv);
            $moyenne = (sizeof($this->ventespv) == 0 ) ? 0 : $TotalVente / $NbreVente;
            $lastVente = (sizeof($this->ventespv) == 0 ) ? new Vente_pv() : $this->ventespv[ sizeof($this->ventespv)-1 ];

            $articles = $this->repoArticle->getAll();
            $unites_stocks = $this->repoUnite->getAll();
            $sel_pv = $this->pv;
            require("template/ventepv.php");

        }
        
        

        function init()
        {          

            $this->pvs = $this->repoPV->getAll();
            $this->ventespv = $this->repoVentePV->getAll();
            $this->lignes_ventespv = $this->repoLigne_ventePV->getAll();
            $this->pv = new Point_de_vente();
            if(!empty($_REQUEST['pv']))
            {
                $this->ventespv = $this->repoVentePV->getVentesPV($_REQUEST['pv']);
                $this->pv =$this->repoPV->getOne($_REQUEST['pv']);
            }

            array_map(function($object){$object->setLignes($this->lignes_ventespv);},$this->ventespv);
            array_map(function($object){$object->setVentes($this->ventespv);},$this->pvs);
                           
        }

        public function subactions()
        {
            if(isset($_REQUEST['subaction'])){

                switch ($_REQUEST['subaction']) {
    
                    case 'save':
                        $this->saveVente();
                        break;
                    case 'deleteVente':
                        $this->deleteVente();
                        break;
                    default:
                        break;
                }
            }
        }

        public function saveVente()
        {
            $vente = new Vente_pv();
            $vente->point_vente = $_REQUEST['point_vente'];
            $vente->date_vente = $_REQUEST['date_vente'];
            // $vente->valeur_total = $_REQUEST['valeur_total'];
            $vente->vente_id = uniqid('vpv_');

            $this->repoVentePV->save($vente);

            $this->save_ligne_vente($vente);
        }

        public function save_ligne_vente($vente)
        {
            if(!empty( $_REQUEST['ligne_vente'] )){
                $Lignes = json_decode($_REQUEST['ligne_vente']);
                foreach ($Lignes as $key => $value) 
                {
                    $ligne = new Ligne_vente_pv();
                    $ligne->article = $key;
                    $ligne->quantite = $value->quantite;
                    $ligne->unite = $value->unite;
                    $ligne->valeur = $value->valeur;
                    $ligne->vente_pv = $vente->vente_id;

                    $this->repoLigne_ventePV->save($ligne);
                }
            }
        }

        public function deleteVente()
        {
            $vente = new Vente_ft();
            $vente->vente_id = $_REQUEST['vente_id'];

            $this->repoVentePV->delete($vente);
        }

    }