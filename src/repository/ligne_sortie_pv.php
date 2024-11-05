<?php

    require_once("src/model/ligne_sortie_pv.php");

    class Ligne_sortie_pvRepository
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
                    "SELECT * FROM KTT_ligne_sortie_pv"
                );


                $statement->execute();
                
                $ligne_sortie_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $ligne_sortie_pv = new Ligne_sortie_pv();
                    $ligne_sortie_pv->sortie_pv = $row['sortie_pv'];
                    $ligne_sortie_pv->quantite = $row['quantite'];
                    $ligne_sortie_pv->valeur = $row['valeur'];
                    $ligne_sortie_pv->article = $row['article'];
                    $ligne_sortie_pv->unite = $row['unite'];

                    $ligne_sortie_pvs[] = $ligne_sortie_pv;
                }
                
                return $ligne_sortie_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($ligne_sortie_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO KTT_ligne_sortie_pv(sortie_pv,valeur,quantite,article,unite) 
                    VALUES(:sortie_pv,:valeur,:quantite,:article,:unite)"
                );

                $statement->bindParam(':sortie_pv',$ligne_sortie_pv->sortie_pv);
                $statement->bindParam(':valeur',$ligne_sortie_pv->valeur);
                $statement->bindParam(':quantite',$ligne_sortie_pv->quantite);
                $statement->bindParam(':article',$ligne_sortie_pv->article);
                $statement->bindParam(':unite',$ligne_sortie_pv->unite);

                $statement->execute();
                                
                return $ligne_sortie_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
        
    }