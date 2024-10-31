<?php

    require_once("src/model/retour_magasin_ft.php");

    class Retour_magasin_ftRepository
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
                    "SELECT * FROM BTL_retour_magasin_ft"
                );


                $statement->execute();
                
                $retour_magasin_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $retour_magasin_ft = new Retour_magasin_ft();
                    $retour_magasin_ft->retour_id = $row['retour_id'];
                    $retour_magasin_ft->date_retour = $row['date_retour'];
                    $retour_magasin_ft->magasin = $row['magasin'];
                    $retour_magasin_ft->food_trucker = $row['food_trucker'];
                    $retour_magasin_ft->observation = $row['observation'];
                    $retour_magasin_ft->enreg_by = $row['enreg_by'];
                    $retour_magasin_ft->uuid = $row['uuid'];

                    $retour_magasin_fts[] = $retour_magasin_ft;
                }
                
                return $retour_magasin_fts;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($retour_magasin_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_retour_magasin_ft(date_retour,magasin,food_trucker,observation,enreg_by,uuid) 
                    VALUES(:date_retour,:magasin,:food_trucker,:observation,:enreg_by,:uuid)"
                );

                $statement->bindParam(':date_retour',$retour_magasin_ft->date_retour);
                $statement->bindParam(':magasin',$retour_magasin_ft->magasin);
                $statement->bindParam(':food_trucker',$retour_magasin_ft->food_trucker);
                $statement->bindParam(':observation',$retour_magasin_ft->observation);
                $statement->bindParam(':enreg_by',$retour_magasin_ft->enreg_by);
                $statement->bindParam(':uuid',$retour_magasin_ft->uuid);

                $statement->execute();

                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM BTL_retour_magasin_ft WHERE uuid = :uuid"
                );

                $statement->bindParam(':uuid',$retour_magasin_ft->uuid);

                $statement->execute();
                

                if($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $retour_magasin_ft->retour_id = $row['retour_id'];
                }
                                
                return $retour_magasin_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function update($retour_magasin_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_retour_magasin_ft SET magasin=:magasin,food_trucker=:food_trucker,observation=:observation,enreg_by=:enreg_by 
                    WHERE retour_id,date_retour"
                );

                $statement->bindParam(':retour_id',$retour_magasin_ft->retour_id);
                $statement->bindParam(':date_retour',$retour_magasin_ft->date_retour);
                $statement->bindParam(':magasin',$retour_magasin_ft->magasin);
                $statement->bindParam(':food_trucker',$retour_magasin_ft->food_trucker);
                $statement->bindParam(':observation',$retour_magasin_ft->observation);
                $statement->bindParam(':enreg_by',$retour_magasin_ft->enreg_by);

                $statement->execute();
                                
                return $retour_magasin_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($retour_magasin_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_ligne_retour_ft WHERE retour_ft = :retour_id"
                );
                $statement->bindParam(':retour_id',$retour_magasin_ft->retour_id);
                $statement->execute();
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_retour_magasin_ft WHERE retour_id = :retour_id"
                );
                $statement->bindParam(':retour_id',$retour_magasin_ft->retour_id);
                $statement->execute();
                                
                return $retour_magasin_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }


    }