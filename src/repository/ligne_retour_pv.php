<?php

    require_once("src/model/ligne_retour_pv.php");

    class Ligne_retour_pvRepository
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
                    "SELECT * FROM KTT_ligne_retour_pv"
                );


                $statement->execute();
                
                $ligne_retour_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $ligne_retour_pv = new Ligne_retour_pv();
                    $ligne_retour_pv->retour_pv = $row['retour_pv'];
                    $ligne_retour_pv->quantite = $row['quantite'];
                    $ligne_retour_pv->valeur = $row['valeur'];
                    $ligne_retour_pv->article = $row['article'];
                    $ligne_retour_pv->unite = $row['unite'];

                    $ligne_retour_pvs[] = $ligne_retour_pv;
                }
                
                return $ligne_retour_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($ligne_retour_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO KTT_ligne_retour_pv(retour_pv,valeur,quantite,article,unite) 
                    VALUES(:retour_pv,:valeur,:quantite,:article,:unite)"
                );

                $statement->bindParam(':retour_pv',$ligne_retour_pv->retour_pv);
                $statement->bindParam(':valeur',$ligne_retour_pv->valeur);
                $statement->bindParam(':quantite',$ligne_retour_pv->quantite);
                $statement->bindParam(':article',$ligne_retour_pv->article);
                $statement->bindParam(':unite',$ligne_retour_pv->unite);

                $statement->execute();
                                
                return $ligne_retour_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
        
    }