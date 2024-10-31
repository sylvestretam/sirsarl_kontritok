<?php

    require_once("src/model/food_trucker.php");

    class Food_truckerRepository
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
                    "SELECT * FROM BTL_food_trucker"
                );


                $statement->execute();
                
                $food_truckers = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $food_trucker = new Food_trucker();
                    $food_trucker->employee = $row['employee'];
                    $food_trucker->noms = $row['noms'];
                    $food_trucker->target_vente = $row['target_vente'];
                    $food_trucker->target_prospection = $row['target_prospection'];

                    $food_truckers[] = $food_trucker;
                }
                
                return $food_truckers;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function getOne($matricule)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM BTL_food_trucker WHERE employee = :employee"
                );

                $statement->bindParam(':employee',$matricule);

                $statement->execute();
                

                if($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $food_trucker = new Food_trucker();
                    $food_trucker->employee = $row['employee'];
                    $food_trucker->noms = $row['noms'];
                    $food_trucker->target_vente = $row['target_vente'];
                    $food_trucker->target_prospection = $row['target_prospection'];

                    return $food_trucker;
                }
                
                return new Food_trucker();

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

    }