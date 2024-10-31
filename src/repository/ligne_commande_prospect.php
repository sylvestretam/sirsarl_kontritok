<?php

    require_once("src/model/ligne_commande_prospect.php");

    class Ligne_commande_prospectRepository
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
                    "SELECT * FROM BTL_ligne_commande_prospect"
                );


                $statement->execute();
                
                $ligne_commande_prospects = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $ligne_commande_prospect = new Ligne_commande_prospect();
                    $ligne_commande_prospect->commande_id = $row['commande_id'];
                    $ligne_commande_prospect->quantite = $row['quantite'];
                    $ligne_commande_prospect->valeur = $row['valeur'];
                    $ligne_commande_prospect->article = $row['article'];
                    $ligne_commande_prospect->unite = $row['unite'];

                    $ligne_commande_prospects[] = $ligne_commande_prospect;
                }
                
                return $ligne_commande_prospects;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($ligne_commande_prospect)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_ligne_commande_prospect(quantite,valeur,quantite,article,unite) 
                    VALUES(:quantite,:valeur,:quantite,:article,:unite)"
                );

                $statement->bindParam(':commande_id',$ligne_commande_prospect->commande_id);
                $statement->bindParam(':valeur',$ligne_commande_prospect->valeur);
                $statement->bindParam(':quantite',$ligne_commande_prospect->quantite);
                $statement->bindParam(':article',$ligne_commande_prospect->article);
                $statement->bindParam(':unite',$ligne_commande_prospect->unite);

                $statement->execute();
                                
                return $ligne_commande_prospect;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
        
        public function delete($ligne_commande_prospect)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_ligne_commande_prospect WHERE article = :article AND unite = :unite AND commande_id = :commande_id"
                );

                $statement->bindParam(':unite',$ligne_commande_prospect->unite);
                $statement->bindParam(':article',$ligne_commande_prospect->article);
                $statement->bindParam(':commande_id',$ligne_commande_prospect->commande_id);

                $statement->execute();
                                
                return $ligne_commande_prospect;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

    }