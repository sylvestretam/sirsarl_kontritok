<?php

    require_once("src/repository/prospect.php");
    require_once("src/repository/food_trucker.php");
    require_once("src/repository/employee.php");
    require_once("src/repository/commande_prospect.php");
    require_once("src/repository/ligne_commande_prospect.php");
    require_once("src/repository/rapport_ft.php");
    require_once("src/repository/activation_pv.php");
    require_once("src/repository/presence_ft.php");
    require_once("src/repository/ligne_presence_ft.php");

    class ProspectionController{

        private $dbconnect;

        private $repoEmployee;
        private $repoFood_trucker;
        private $repoProspect;
        private $repoCommande;
        private $repoLigne;
        private $repoRapport;
        private $repoPresenceFT;
        private $repoLignePresenceFT;

        private $prospects = [];
        private $food_truckers = [];
        private $employees = [];
        private $commandes = [];
        private $lignes_commande = [];
        private $presences_fts = [];

        public function __construct()
        {
            $this->dbconnect = new DbConnect();
            $this->repoEmployee = new EmployeeRepository($this->dbconnect);
            $this->repoFood_trucker = new Food_truckerRepository($this->dbconnect);
            $this->repoProspect = new ProspectRepository($this->dbconnect);
            $this->repoCommande = new Commande_prospectRepository($this->dbconnect);
            $this->repoLigne = new Ligne_commande_prospectRepository($this->dbconnect);
            $this->repoRapport = new Rapport_ftRepository($this->dbconnect);
            $this->repoPresenceFT = new Presence_ftRepository($this->dbconnect);
            $this->repoLignePresenceFT = new Ligne_presence_ftRepository($this->dbconnect);

            if (!empty($_REQUEST['subaction'])) {
                $this->subactions($_REQUEST['subaction']);
            }
            
            $this->init();
        }

        public function show()
        {
            $food_truckers = $this->food_truckers;
            $prospects = $this->prospects;
            $commandes = $this->commandes;

            $presences_fts = $this->presences_fts;

            $TotalCommande = array_reduce($this->commandes,function($carry, $object){ return  $carry+($object->total);},0);
            $TotalTarget = array_reduce($this->food_truckers,function($carry, $object){ return  $carry+($object->target_prospection);},0) * sizeof($presences_fts);
            
            require("template/prospection.php");
        }
        
        function init()
        {          
            $this->employees = $this->repoEmployee->getAll();
            $this->food_truckers = $this->repoFood_trucker->getAll();
            $this->prospects = $this->repoProspect->getAll();
            $this->commandes = $this->repoCommande->getAll();
            $this->lignes_commande = $this->repoLigne->getAll();
            $this->presences_fts = $this->repoPresenceFT->getAll();

            array_map(function($object){$object->setLignesCommande($this->lignes_commande);},$this->commandes);
            array_map(function($object){$object->setCommande($this->commandes);},$this->prospects);
            array_map(function($object){$object->setEmployee($this->employees);},$this->food_truckers);
            array_map(function($object){$object->setProspects($this->prospects);},$this->food_truckers);
        }

        function subactions($subaction)
        {
            $repoProspect = new ProspectRepository($this->dbconnect);

            switch ($subaction) {
                case 'updateStatus':

                    $prospect = new Prospect();
                    $prospect->prospection_id = $_REQUEST['prospect_id'];
                    $prospect->status = $_REQUEST['status'];
                    $prospect->status_by = $_SESSION['matricule'];

                    $repoProspect->updateStatus($prospect);
                    break;
                case 'delete':
                    $prospect = new Prospect();
                    $prospect->prospection_id = $_REQUEST['prospect_id'];

                    $repoProspect->delete($prospect);
                    // $GLOBALS['error'] = json_encode($_REQUEST);
                    break;
                default:
                    # code...
                    break;
            }

        }


    }