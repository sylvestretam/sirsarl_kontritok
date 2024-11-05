<?php

    require_once("src/model/ligne_vente_ft.php");

    class Ligne_vente_ftRepository
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
                    "SELECT * FROM KTT_ligne_vente_md"
                );


                $statement->execute();
                
                $ligne_vente_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $ligne_vente_ft = new Ligne_vente_ft();
                    $ligne_vente_ft->vente_ft = $row['vente_md'];
                    $ligne_vente_ft->quantite = $row['quantite'];
                    $ligne_vente_ft->valeur = $row['valeur'];
                    $ligne_vente_ft->article = $row['article'];
                    $ligne_vente_ft->unite = $row['unite'];

                    $ligne_vente_fts[] = $ligne_vente_ft;
                }
                
                return $ligne_vente_fts;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($ligne_vente_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO KTT_ligne_vente_md(vente_md,quantite,valeur,article,unite) 
                    VALUES(:vente_ft,:quantite,:valeur,:article,:unite)"
                );

                $statement->bindParam(':vente_ft',$ligne_vente_ft->vente_ft);
                $statement->bindParam(':valeur',$ligne_vente_ft->valeur);
                $statement->bindParam(':quantite',$ligne_vente_ft->quantite);
                $statement->bindParam(':article',$ligne_vente_ft->article);
                $statement->bindParam(':unite',$ligne_vente_ft->unite);

                $statement->execute();
                                
                return $ligne_vente_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
        
    }