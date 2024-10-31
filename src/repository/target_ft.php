<?php

    require_once("src/model/target_ft.php");

    class Target_ftRepository
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
                    "SELECT * FROM BTL_target_ft"
                );


                $statement->execute();
                
                $target_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $target_ft = new Target_ft();
                    $target_ft->article = $row['article'];
                    $target_ft->unite = $row['unite'];
                    $target_ft->quantite = $row['quantite'];
                    $target_ft->valeur = $row['valeur'];
                    $target_ft->food_trucker = $row['food_trucker'];

                    $target_fts[] = $target_ft;
                }
                
                return $target_fts;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }
    }