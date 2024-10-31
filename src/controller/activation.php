<?php

    require_once("src/repository/prospect.php");
    require_once("src/repository/food_trucker.php");
    require_once("src/repository/employee.php");
    require_once("src/repository/commande_prospect.php");
    require_once("src/repository/ligne_commande_prospect.php");

    require_once("src/repository/point_de_vente.php");
    require_once("src/repository/activation_pv.php");
    require_once("src/repository/ligne_activation_pv.php");
    require_once("src/repository/article.php");
    require_once("src/repository/unite_stock.php");

    class ActivationController{

        private $dbconnect;
        private $repoPV;
        private $repoEmployee;
        private $repoFood_trucker;
        private $repoProspect;
        private $repoCommande;
        private $repoLigne;
        private $repoActivation;
        private $repoLigneActivation;
        private $repoArticle;
        private $repoUnite;

        private $pvs = [];
        private $prospects,$prospectsC = [];
        private $food_truckers = [];
        private $employees = [];
        private $commandes = [];
        private $lignes_commande = [];
        private $articles = [];
        private $unites_stocks = [];
        private $activations = [];
        private $lignes_activations = [];

        public function __construct()
        {
            $this->dbconnect = new DbConnect();
            $this->repoPV = new Point_de_venteRepository($this->dbconnect);
            $this->repoEmployee = new EmployeeRepository($this->dbconnect);
            $this->repoFood_trucker = new Food_truckerRepository($this->dbconnect);
            $this->repoProspect = new ProspectRepository($this->dbconnect);
            $this->repoCommande = new Commande_prospectRepository($this->dbconnect);
            $this->repoLigne = new Ligne_commande_prospectRepository($this->dbconnect);
            $this->repoActivation = new Activation_pvRepository($this->dbconnect);
            $this->repoLigneActivation = new Ligne_activation_pvRepository($this->dbconnect);
            $this->repoPV = new Point_de_venteRepository($this->dbconnect);
            $this->repoArticle = new ArticleRepository($this->dbconnect);
            $this->repoUnite = new Unite_stockRepository($this->dbconnect);

            if (!empty($_REQUEST['subaction'])) {
                $this->subactions($_REQUEST['subaction']);
            }

            $this->init();
        }

        public function show()
        {

            $pvs = $this->pvs;
            $prospects = $this->prospects;
            $articles = $this->articles;
            $unites_stocks = $this->unites_stocks;
            // var_dump($prospects);

            $TotalActivation = array_reduce($this->activations,function($carry, $object){ return  $carry + $object->total;},0);
            $NbreActivation = sizeof($this->activations);
            $moyenne = ($NbreActivation == 0 ) ? 0 : $TotalActivation / $NbreActivation;
            $lastActivation = ($NbreActivation == 0 ) ? new Activation_pv : $this->activations[$NbreActivation-1];

            require("template/pv.php");
        }
        
        function init()
        {

            $this->employees = $this->repoEmployee->getAll();
            $this->food_truckers = $this->repoFood_trucker->getAll();
            $this->prospects = $this->repoProspect->getAll();
            $this->commandes = $this->repoCommande->getAll();
            $this->lignes_commande = $this->repoLigne->getAll();

            $this->pvs = $this->repoPV->getAll();
            $this->articles = $this->repoArticle->getAll();
            $this->unites_stocks = $this->repoUnite->getAll();
            $this->activations = $this->repoActivation->getAll();
            $this->lignes_activations = $this->repoLigneActivation->getAll();

            array_map(function($object){$object->setLignesCommande($this->lignes_commande);},$this->commandes);
            array_map(function($object){$object->setLignesActivation($this->lignes_activations);},$this->activations);
            array_map(function($object){$object->setCommande($this->commandes);},$this->prospects);
            array_map(function($object){$object->setEmployee($this->employees);},$this->food_truckers);
            array_map(function($object){$object->setProspects($this->prospects);},$this->food_truckers);
            array_map(function($object){$object->setProspect($this->prospects);},$this->pvs);
            array_map(function($object){$object->setActivation($this->activations);},$this->pvs);
        }

        function subactions($subaction)
        {

            switch ($subaction) {
                case 'save':
                    $prospect = new Prospect();
                    $prospect->prospection_id = $_REQUEST['prospection_id'];
                    $prospect->status = "ACTIVE";
                    $prospect->status_by = $_SESSION['matricule'];

                    $repo = new ProspectRepository($this->dbconnect);
                    $repo->updateStatus($prospect);

                    $pv = new Point_de_vente();
                    $pv->code_pv = strtoupper( uniqid('pv_') );
                    $pv->nom = $_REQUEST['nom_pv'];
                    $pv->type = $_REQUEST['type_pv'];
                    $pv->prospect = $_REQUEST['prospection_id'];
                    $pv->status = "ACTIVE";
                    $pv->status_by = $_SESSION['matricule'];

                    $repoPV = new Point_de_venteRepository($this->dbconnect);
                    $repoPV->save($pv);

                    $activation = new Activation_pv();
                    $activation->date_activation = $_REQUEST['date_activation'];;
                    $activation->point_de_vente = $pv->code_pv;

                    $repo = new Activation_pvRepository($this->dbconnect);
                    $activation = $repo->save($activation);

                    $Lignes = json_decode($_REQUEST['ligne_activation']);

                    foreach ($Lignes as $key => $value) 
                    {
                        $ligne = new Ligne_activation_pv();
                        $ligne->article = $key;
                        $ligne->quantite = $value->quantite;
                        $ligne->unite = $value->unite;
                        $ligne->valeur = $value->valeur;
                        $ligne->activation_id = $activation->activation_id;
        
                        $repo = new Ligne_activation_pvRepository($this->dbconnect);
                        $repo->save($ligne);
                    }

                    break;
                case 'delete':
                    $pv = new Point_de_vente();
                    $pv->code_pv = $_REQUEST['code_pv'];

                    $repoPV = new Point_de_venteRepository($this->dbconnect);
                    $repoPV->delete($pv);

                    $prospect = new Prospect();
                    $prospect->prospection_id = $_REQUEST['prospection_id'];
                    $prospect->status = "PROSPECT";
                    $prospect->status_by = $_SESSION['matricule'];

                    $repo = new ProspectRepository($this->dbconnect);
                    $repo->updateStatus($prospect);
                    break;
                default:
                    # code...
                    break;
            }

        }

    }