<?php

    require_once("src/model/target_pv.php");

    class Target_pvRepository
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
                    "SELECT * FROM KTT_target_pv"
                );


                $statement->execute();
                
                $target_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $target_pv = new Target_pv();
                    $target_pv->article = $row['article'];
                    $target_pv->unite = $row['unite'];
                    $target_pv->quantite = $row['quantite'];
                    $target_pv->valeur = $row['valeur'];
                    $target_pv->point_de_vente = $row['point_de_vente'];

                    $target_pvs[] = $target_pv;
                }
                
                return $target_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
    }