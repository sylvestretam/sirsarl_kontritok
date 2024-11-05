<?php

    require_once("src/model/sortie_magasin_ft.php");

    class Sortie_magasin_ftRepository
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
                    "SELECT * FROM KTT_sortie_magasin_sup"
                );


                $statement->execute();
                
                $sortie_magasin_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $sortie_magasin_ft = new Sortie_magasin_ft();
                    $sortie_magasin_ft->sortie_id = $row['sortie_id'];
                    $sortie_magasin_ft->date_sortie = $row['date_sortie'];
                    $sortie_magasin_ft->magasin = $row['magasin'];
                    $sortie_magasin_ft->food_trucker = $row['superviseur'];
                    $sortie_magasin_ft->observation = $row['observation'];
                    $sortie_magasin_ft->enreg_by = $row['enreg_by'];

                    $sortie_magasin_fts[] = $sortie_magasin_ft;
                }
                
                return $sortie_magasin_fts;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($sortie_magasin_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO KTT_sortie_magasin_sup(sortie_id,date_sortie,magasin,superviseur,observation,enreg_by,uuid) 
                    VALUES(:sortie_id,:date_sortie,:magasin,:food_trucker,:observation,:enreg_by,:uuid)"
                );

                $statement->bindParam(':sortie_id',$sortie_magasin_ft->sortie_id);
                $statement->bindParam(':date_sortie',$sortie_magasin_ft->date_sortie);
                $statement->bindParam(':magasin',$sortie_magasin_ft->magasin);
                $statement->bindParam(':food_trucker',$sortie_magasin_ft->food_trucker);
                $statement->bindParam(':observation',$sortie_magasin_ft->observation);
                $statement->bindParam(':enreg_by',$sortie_magasin_ft->enreg_by);
                $statement->bindParam(':uuid',$sortie_magasin_ft->uuid);

                $statement->execute();

                // $statement = $this->dbconnect->getConection()->prepare(
                //     "SELECT * FROM KTT_sortie_magasin_sup WHERE uuid = :uuid"
                // );


                // $statement->bindParam(':uuid',$sortie_magasin_ft->uuid);

                // $statement->execute();

                // if($row = $statement->fetch(PDO::FETCH_ASSOC))
                // {        
                //     $sortie_magasin_ft->sortie_id = $row['sortie_id'];
                // }
                                
                return $sortie_magasin_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function update($sortie_magasin_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE KTT_sortie_magasin_sup SET magasin=:magasin,food_trucker=:food_trucker,observation=:observation,enreg_by=:enreg_by 
                    WHERE sortie_id,date_sortie"
                );

                $statement->bindParam(':sortie_id',$sortie_magasin_ft->sortie_id);
                $statement->bindParam(':date_sortie',$sortie_magasin_ft->date_sortie);
                $statement->bindParam(':magasin',$sortie_magasin_ft->magasin);
                $statement->bindParam(':food_trucker',$sortie_magasin_ft->food_trucker);
                $statement->bindParam(':observation',$sortie_magasin_ft->observation);
                $statement->bindParam(':enreg_by',$sortie_magasin_ft->enreg_by);

                $statement->execute();
                                
                return $sortie_magasin_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($sortie_magasin_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM KTT_ligne_sortie_sup WHERE sortie_sup = :sortie_id"
                );
                $statement->bindParam(':sortie_id',$sortie_magasin_ft->sortie_id);
                $statement->execute();
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM KTT_sortie_magasin_sup WHERE sortie_id = :sortie_id"
                );
                $statement->bindParam(':sortie_id',$sortie_magasin_ft->sortie_id);
                $statement->execute();
                                
                return $sortie_magasin_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }


    }