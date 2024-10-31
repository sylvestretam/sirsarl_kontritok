<?php

    require_once("src/model/rapport_ft.php");

    class Rapport_ftRepository
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
                    "SELECT * FROM BTL_rapport_ft"
                );


                $statement->execute();
                
                $rapport_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $rapport_ft = new rapport_ft();
                    $rapport_ft->date_jour = $row['date_jour'];
                    $rapport_ft->food_trucker = $row['food_trucker'];
                    $rapport_ft->prospection = $row['prospection'];
                    $rapport_ft->convertion = $row['convertion'];
                    $rapport_ft->vente = $row['vente'];
                    $rapport_ft->observation = $row['observation'];

                    $rapport_fts[] = $rapport_ft;
                }
                
                return $rapport_fts;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function save($rapport_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_rapport_ft(date_jour,food_trucker,prospection,convertion,vente,observation) 
                    VALUES(:date_jour,:food_trucker,:prospection,:convertion,:vente,:observation)"
                );

                $statement->bindParam(':date_jour',$rapport_ft->date_jour);
                $statement->bindParam(':food_trucker',$rapport_ft->food_trucker);
                $statement->bindParam(':prospection',$rapport_ft->prospection);
                $statement->bindParam(':convertion',$rapport_ft->convertion);
                $statement->bindParam(':vente',$rapport_ft->vente);
                $statement->bindParam(':observation',$rapport_ft->observation);

                $statement->execute();
                                
                return $rapport_ft;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function update($rapport_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_rapport_ft SET prospection=:prospection,convertion=:convertion,vente=:vente,observation=:observation
                    WHERE date_jour=:date_jour AND food_trucker=:food_trucker"
                );

                $statement->bindParam(':date_jour',$rapport_ft->date_jour);
                $statement->bindParam(':food_trucker',$rapport_ft->food_trucker);
                $statement->bindParam(':prospection',$rapport_ft->prospection);
                $statement->bindParam(':convertion',$rapport_ft->convertion);
                $statement->bindParam(':vente',$rapport_ft->vente);
                $statement->bindParam(':observation',$rapport_ft->observation);

                $statement->execute();
                                
                return $rapport_ft;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function delete($rapport_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_rapport_ft WHERE date_jour=:date_jour AND food_trucker=:food_trucker"
                );

                $statement->bindParam(':date_jour',$rapport_ft->date_jour);
                $statement->bindParam(':food_trucker',$rapport_ft->food_trucker);

                $statement->execute();
                                
                return $rapport_ft;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }


    }