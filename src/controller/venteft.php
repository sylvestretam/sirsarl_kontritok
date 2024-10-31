<?php
    require_once("src/repository/employee.php");
    require_once("src/repository/food_trucker.php");
    require_once("src/repository/article.php");
    require_once("src/repository/unite_stock.php");
    require_once("src/repository/vente_ft.php");
    require_once("src/repository/ligne_vente_ft.php");
    require_once("src/repository/unite_article.php");

    class VenteFTController{

        private $dbconnect;
        private $repoPresenceFT;
        private $repoFood_trucker;
        private $repoVenteFT;
        private $repoLigne_venteFT;

        private $repoArticle;
        private $repoUnite;
        
        private $food_truckers = [];
        private $food_trucker;
        private $presences_fts = [];
        private $ventesft = [];
        private $lignes_vente_ft = [];
        private $magasins = [];
        private $unites_articles = [];

        public function __construct()
        {
            $this->dbconnect = new DbConnect();

            $this->repoFood_trucker = new Food_truckerRepository($this->dbconnect);
            $this->repoVenteFT = new Vente_ftRepository($this->dbconnect);
            $this->repoLigne_venteFT = new Ligne_vente_ftRepository($this->dbconnect);
            $this->repoPresenceFT = new Presence_ftRepository($this->dbconnect);

            $this->repoArticle = new ArticleRepository($this->dbconnect);
            $this->repoUnite = new Unite_stockRepository($this->dbconnect);

            $this->subactions();

            $this->init();
        }

        public function show()
        {
            $food_truckers = $this->food_truckers;
            $ventesft = $this->ventesft;
            $presences_fts = $this->presences_fts;

            $TotalVente = array_reduce($this->ventesft,function($carry, $object){ return  $carry+($object->valeur_total);},0);
            $NbreVente = sizeof($this->ventesft);
            $moyenne = (sizeof($this->ventesft) == 0 ) ? 0 : $TotalVente / $NbreVente;
            $lastVente = (sizeof($this->ventesft) == 0 ) ? new Vente_ft() : $this->ventesft[ sizeof($this->ventesft)-1 ];

            $articles = $this->repoArticle->getAll();
            $unites_stocks = $this->repoUnite->getAll(); 
            $sel_food_trucker = $this->food_trucker;
            require("template/venteft.php");

        }
        
        

        function init()
        {          
            $this->food_truckers = $this->repoFood_trucker->getAll();
            $this->presences_fts = $this->repoPresenceFT->getAll();

            $this->ventesft = $this->repoVenteFT->getAll();
            $this->lignes_vente_ft = $this->repoLigne_venteFT->getAll();
            $this->food_trucker = new Food_trucker();
            if(!empty($_REQUEST['ft']))
            {
                $this->ventesft = $this->repoVenteFT->getVenteFT($_REQUEST['ft']);
                $this->food_trucker =$this->repoFood_trucker->getOne($_REQUEST['ft']);
            }

            array_map(function($object){$object->setLignes($this->lignes_vente_ft);},$this->ventesft);
            array_map(function($object){$object->setVentes($this->ventesft);},$this->food_truckers);
            
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
            $vente = new Vente_ft();
            $vente->food_trucker = $_REQUEST['food_trucker'];
            $vente->date_vente = $_REQUEST['date_vente'];
            // $vente->valeur_total = $_REQUEST['valeur_total'];
            $vente->vente_id = uniqid('vft_');

            $this->repoVenteFT->save($vente);

            $this->save_ligne_vente($vente);
        }

        public function save_ligne_vente($vente)
        {
            if(!empty( $_REQUEST['ligne_vente'] )){
                $Lignes = json_decode($_REQUEST['ligne_vente']);
                foreach ($Lignes as $key => $value) 
                {
                    $ligne = new Ligne_vente_ft();
                    $ligne->article = $key;
                    $ligne->quantite = $value->quantite;
                    $ligne->unite = $value->unite;
                    $ligne->valeur = $value->valeur;
                    $ligne->vente_ft = $vente->vente_id;

                    $this->repoLigne_venteFT->save($ligne);
                }
            }
        }

        public function deleteVente()
        {
            $vente = new Vente_ft();
            $vente->vente_id = $_REQUEST['vente_id'];

            $this->repoVenteFT->delete($vente);
        }

    }