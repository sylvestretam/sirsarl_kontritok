<?php

    class GRHController{

        private $dbconnect;
        private $repoFood_trucker;
        private $repoPresenceFT;
        private $repoLignePresenceFT;

        private $food_truckers = [];
        private $presences_fts = [];
        private $lignes_presences_fts = [];

        public function __construct()
        {
            $this->dbconnect = new DbConnect();

            $this->repoFood_trucker = new Food_truckerRepository($this->dbconnect);
            $this->repoPresenceFT = new Presence_ftRepository($this->dbconnect);
            $this->repoLignePresenceFT = new Ligne_presence_ftRepository($this->dbconnect);

            if(isset($_REQUEST['subaction']))
                $this->subactions( $_REQUEST['subaction'] );

            $this->init();
        }

        function init()
        {          
            $this->food_truckers = $this->repoFood_trucker->getAll();
            $this->presences_fts = $this->repoPresenceFT->getAll();
            $this->lignes_presences_fts = $this->repoLignePresenceFT->getAll();

            array_map(function($object){$object->setFT($this->food_truckers);},$this->lignes_presences_fts);
            array_map(function($object){$object->setLignes($this->lignes_presences_fts);},$this->presences_fts);
        }

        public function show()
        {
            $food_truckers = $this->food_truckers;
            $presences_fts = $this->presences_fts;

            $presences = array_reduce($this->presences_fts,function($carry, $object){ return  $carry+(sizeof($object->presents)/sizeof($object->lignes));},0);
            $absences = array_reduce($this->presences_fts,function($carry, $object){ return  $carry+(sizeof($object->absents)/sizeof($object->lignes));},0);
            $TauxPresence = (sizeof($presences_fts) == 0 ) ? 0 : $presences / sizeof($presences_fts) * 100;
            $TauxAbsence = (sizeof($presences_fts) == 0 ) ? 0 : $absences / sizeof($presences_fts)  * 100;
            $LastDate = (empty($presences_fts) ) ? new Presence_ft() : $presences_fts[ sizeof($presences_fts)-1 ];

            require("template/grh.php");
        }

        function subactions($subaction)
        {

            switch ($subaction) {
                case 'addFiche':

                    $presence = new Presence_ft();
                    $presence->date_jour = $_REQUEST['date_jour'];
                    $presence->observation = $_REQUEST['observation'];

                    $this->repoPresenceFT->save($presence);

                    if(!empty( $_REQUEST['ligne_presence'] )){
                        $Lignes = json_decode($_REQUEST['ligne_presence']);
        
                        foreach ($Lignes as $key => $value) 
                        {
                            $ligne = new Ligne_presence_ft();
                            $ligne->date_presence = $presence->date_jour;
                            $ligne->food_trucker =  $key;
                            $ligne->status = $value->status;
        
                            $this->repoLignePresenceFT->save($ligne);
                        }
                    }

                    break;
                case 'deleteFiche':
                    $presence = new Presence_ft();
                    $presence->date_jour = $_REQUEST['date_jour'];

                    $this->repoPresenceFT->delete($presence);
                    break;
                default:
                    # code...
                    break;
            }

        }

    }