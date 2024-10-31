<?php

    require_once("src/model/ligne_retour_ft.php");

    class Ligne_retour_ftRepository
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
                    "SELECT * FROM BTL_ligne_retour_ft"
                );


                $statement->execute();
                
                $ligne_retour_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $ligne_retour_ft = new Ligne_retour_ft();
                    $ligne_retour_ft->retour_ft = $row['retour_ft'];
                    $ligne_retour_ft->quantite = $row['quantite'];
                    $ligne_retour_ft->valeur = $row['valeur'];
                    $ligne_retour_ft->article = $row['article'];
                    $ligne_retour_ft->unite = $row['unite'];

                    $ligne_retour_fts[] = $ligne_retour_ft;
                }
                
                return $ligne_retour_fts;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($ligne_retour_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_ligne_retour_ft(retour_ft,valeur,quantite,article,unite) 
                    VALUES(:retour_ft,:valeur,:quantite,:article,:unite)"
                );

                $statement->bindParam(':retour_ft',$ligne_retour_ft->retour_ft);
                $statement->bindParam(':quantite',$ligne_retour_ft->quantite);
                $statement->bindParam(':valeur',$ligne_retour_ft->valeur);
                $statement->bindParam(':article',$ligne_retour_ft->article);
                $statement->bindParam(':unite',$ligne_retour_ft->unite);

                $statement->execute();
                                
                return $ligne_retour_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
        
        public function delete($ligne_commande_prospect)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_ligne_retour_ft WHERE article = :article AND unite = :unite AND retour_ft = :retour_ft"
                );

                $statement->bindParam(':unite',$ligne_commande_prospect->unite);
                $statement->bindParam(':article',$ligne_commande_prospect->article);
                $statement->bindParam(':retour_ft',$ligne_commande_prospect->retour_ft);

                $statement->execute();
                                
                return $ligne_commande_prospect;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

    }