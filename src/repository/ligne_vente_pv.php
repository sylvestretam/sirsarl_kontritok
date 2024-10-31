<?php

    require_once("src/model/ligne_vente_pv.php");

    class Ligne_vente_pvRepository
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
                    "SELECT * FROM BTL_ligne_vente_pv"
                );


                $statement->execute();
                
                $ligne_vente_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $ligne_vente_pv = new Ligne_vente_pv();
                    $ligne_vente_pv->vente_pv = $row['vente_pv'];
                    $ligne_vente_pv->quantite = $row['quantite'];
                    $ligne_vente_pv->valeur = $row['valeur'];
                    $ligne_vente_pv->article = $row['article'];
                    $ligne_vente_pv->unite = $row['unite'];

                    $ligne_vente_pvs[] = $ligne_vente_pv;
                }
                
                return $ligne_vente_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($ligne_vente_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_ligne_vente_pv(vente_pv,quantite,valeur,article,unite) 
                    VALUES(:vente_pv,:quantite,:valeur,:article,:unite)"
                );

                $statement->bindParam(':vente_pv',$ligne_vente_pv->vente_pv);
                $statement->bindParam(':valeur',$ligne_vente_pv->valeur);
                $statement->bindParam(':quantite',$ligne_vente_pv->quantite);
                $statement->bindParam(':article',$ligne_vente_pv->article);
                $statement->bindParam(':unite',$ligne_vente_pv->unite);

                $statement->execute();
                                
                return $ligne_vente_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
        
    }