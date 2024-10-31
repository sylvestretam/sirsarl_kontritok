<?php

    require_once("src/model/commande_prospect.php");

    class Commande_prospectRepository
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
                    "SELECT * FROM BTL_commande_prospect"
                );


                $statement->execute();
                
                $commande_prospects = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $commande_prospect = new Commande_prospect();
                    $commande_prospect->commande_id = $row['commande_id'];
                    $commande_prospect->date_livraison = $row['date_livraison'];
                    $commande_prospect->prospect = $row['prospect'];

                    $commande_prospects[] = $commande_prospect;
                }
                
                return $commande_prospects;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function save($commande_prospect)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_commande_prospect(commande_id,date_livraison,prospect) 
                    VALUES(:commande_id,:date_livraison,:prospect)"
                );

                $statement->bindParam(':commande_id',$commande_prospect->commande_id);
                $statement->bindParam(':date_livraison',$commande_prospect->date_livraison);
                $statement->bindParam(':prospect',$commande_prospect->prospect);

                $statement->execute();
                                
                return $commande_prospect;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function update($commande_prospect)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_commande_prospect SET date_livraison=:date_livraison,prospect=:prospect 
                    WHERE commande_id=:commande_id"
                );

                $statement->bindParam(':commande_id',$commande_prospect->commande_id);
                $statement->bindParam(':date_livraison',$commande_prospect->date_livraison);
                $statement->bindParam(':prospect',$commande_prospect->prospect);

                $statement->execute();
                                
                return $commande_prospect;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function delete($commande_prospect)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_ligne_commande_prospect WHERE commande_id = :commande_id"
                );
                $statement->bindParam(':commande_id',$commande_prospect->commande_id);
                $statement->execute();

                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_commande_prospect WHERE commande_id = :commande_id"
                );
                $statement->bindParam(':commande_id',$commande_prospect->commande_id);
                $statement->execute();
                                
                return $commande_prospect;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }


    }