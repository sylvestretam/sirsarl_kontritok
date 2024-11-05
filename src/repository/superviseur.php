<?php

    require_once("src/model/superviseur.php");

    class SuperviseurRepository
    {
        private $dbconnect;

        public function __construct($dbconnect)
        {
            $this->dbconnect = $dbconnect;
        }

        public function getAll()
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM KTT_superviseur"
                );


                $statement->execute();
                
                $superviseurs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $superviseur = new Superviseur();
                    $superviseur->employee = $row['employee'];
                    $superviseur->noms = $row['noms'];
                    $superviseur->target_vente = $row['target_vente'];
                    $superviseur->target_prospection = $row['target_prospection'];

                    $superviseurs[] = $superviseur;
                }
                
                return $superviseurs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

    }