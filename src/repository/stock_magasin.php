<?php

    require_once("src/model/stock_magasin.php");

    class Stock_magasinRepository
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
                    "SELECT * FROM KTT_stock_magasin"
                );


                $statement->execute();
                
                $stock_magasins = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $stock_magasin = new Stock_magasin();
                    $stock_magasin->magasin = $row['magasin'];
                    $stock_magasin->article = $row['article'];
                    $stock_magasin->unite = $row['unite'];
                    $stock_magasin->quantite = $row['quantite'];
                    $stock_magasin->valeur = $row['valeur'];

                    $stock_magasins[] = $stock_magasin;
                }
                
                return $stock_magasins;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
    }