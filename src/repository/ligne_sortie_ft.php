<?php

    require_once("src/model/ligne_sortie_ft.php");

    class Ligne_sortie_ftRepository
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
                    "SELECT * FROM BTL_ligne_sortie_ft"
                );


                $statement->execute();
                
                $ligne_sortie_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $ligne_sortie_ft = new Ligne_sortie_ft();
                    $ligne_sortie_ft->sortie_ft = $row['sortie_ft'];
                    $ligne_sortie_ft->quantite = $row['quantite'];
                    $ligne_sortie_ft->valeur = $row['valeur'];
                    $ligne_sortie_ft->article = $row['article'];
                    $ligne_sortie_ft->unite = $row['unite'];

                    $ligne_sortie_fts[] = $ligne_sortie_ft;
                }
                
                return $ligne_sortie_fts;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($ligne_sortie_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_ligne_sortie_ft(sortie_ft,valeur,quantite,article,unite) 
                    VALUES(:sortie_ft,:valeur,:quantite,:article,:unite)"
                );

                $statement->bindParam(':sortie_ft',$ligne_sortie_ft->sortie_ft);
                $statement->bindParam(':valeur',$ligne_sortie_ft->valeur);
                $statement->bindParam(':quantite',$ligne_sortie_ft->quantite);
                $statement->bindParam(':article',$ligne_sortie_ft->article);
                $statement->bindParam(':unite',$ligne_sortie_ft->unite);

                $statement->execute();
                                
                return $ligne_sortie_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
        
    }