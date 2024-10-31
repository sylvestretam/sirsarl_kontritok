<?php

    require_once("src/model/ligne_presence_ft.php");

    class Ligne_presence_ftRepository
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
                    "SELECT * FROM BTL_ligne_presence_ft"
                );


                $statement->execute();
                
                $ligne_presence_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $ligne_presence_ft = new ligne_presence_ft();
                    $ligne_presence_ft->date_presence = $row['date_presence'];
                    $ligne_presence_ft->food_trucker = $row['food_trucker'];
                    $ligne_presence_ft->status = $row['status'];

                    $ligne_presence_fts[] = $ligne_presence_ft;
                }
                
                return $ligne_presence_fts;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($ligne_presence_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_ligne_presence_ft(date_presence,food_trucker,status) 
                    VALUES(:date_presence,:food_trucker,:status)"
                );

                $statement->bindParam(':date_presence',$ligne_presence_ft->date_presence);
                $statement->bindParam(':food_trucker',$ligne_presence_ft->food_trucker);
                $statement->bindParam(':status',$ligne_presence_ft->status);

                $statement->execute();
                                
                return $ligne_presence_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

    }