<?php

    require_once("src/model/stock_ft.php");

    class Stock_ftRepository
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
                    "SELECT * FROM BTL_stock_ft"
                );


                $statement->execute();
                
                $stock_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $stock_ft = new Stock_ft();
                    $stock_ft->article = $row['article'];
                    $stock_ft->unite = $row['unite'];
                    $stock_ft->quantite = $row['quantite'];

                    $stock_fts[] = $stock_ft;
                }
                
                return $stock_fts;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }
    }