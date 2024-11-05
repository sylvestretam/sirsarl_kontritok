<?php

    require_once("src/model/market_develloper.php");

    class MarketDevelloperRepository
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
                    "SELECT * FROM KTT_market_develloper"
                );


                $statement->execute();
                
                $MarketDevellopers = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $MarketDevelloper = new MarketDevelloper();
                    $MarketDevelloper->employee = $row['employee'];
                    $MarketDevelloper->noms = $row['noms'];
                    $MarketDevelloper->target_vente = $row['target_vente'];
                    $MarketDevelloper->target_prospection = $row['target_prospection'];

                    $MarketDevellopers[] = $MarketDevelloper;
                }
                
                return $MarketDevellopers;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function getOne($matricule)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM KTT_market_develloper WHERE employee = :employee"
                );

                $statement->bindParam(':employee',$matricule);

                $statement->execute();
                

                if($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $MarketDevelloper = new MarketDevelloper();
                    $MarketDevelloper->employee = $row['employee'];
                    $MarketDevelloper->noms = $row['noms'];
                    $MarketDevelloper->target_vente = $row['target_vente'];
                    $MarketDevelloper->target_prospection = $row['target_prospection'];

                    return $MarketDevelloper;
                }
                
                return new MarketDevelloper();

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

    }