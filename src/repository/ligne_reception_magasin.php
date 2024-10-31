<?php

    require_once("src/model/ligne_reception_magasin.php");

    class Ligne_reception_magasinRepository
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
                    "SELECT * FROM BTL_ligne_reception_magasin"
                );


                $statement->execute();
                
                $ligne_reception_magasins = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $ligne_reception_magasin = new Ligne_reception_magasin();
                    $ligne_reception_magasin->reception = $row['reception'];
                    $ligne_reception_magasin->quantite = $row['quantite'];
                    $ligne_reception_magasin->valeur = $row['valeur'];
                    $ligne_reception_magasin->article = $row['article'];
                    $ligne_reception_magasin->unite = $row['unite'];

                    $ligne_reception_magasins[] = $ligne_reception_magasin;
                }
                
                return $ligne_reception_magasins;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($ligne_reception_magasin)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_ligne_reception_magasin(reception,quantite,valeur,article,unite) 
                    VALUES(:reception,:quantite,:valeur,:article,:unite)"
                );

                $statement->bindParam(':reception',$ligne_reception_magasin->reception);
                $statement->bindParam(':quantite',$ligne_reception_magasin->quantite);
                $statement->bindParam(':valeur',$ligne_reception_magasin->valeur);
                $statement->bindParam(':article',$ligne_reception_magasin->article);
                $statement->bindParam(':unite',$ligne_reception_magasin->unite);

                $statement->execute();
                                
                return $ligne_reception_magasin;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

    }