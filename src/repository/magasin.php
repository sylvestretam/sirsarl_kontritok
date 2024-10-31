<?php

    require_once("src/model/magasin.php");

    class MagasinRepository
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
                    "SELECT * FROM BTL_magasin"
                );


                $statement->execute();
                
                $magasins = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $magasin = new Magasin();
                    $magasin->code = $row['code'];
                    $magasin->designation = $row['designation'];
                    $magasin->localisation = $row['localisation'];

                    $magasins[] = $magasin;
                }
                
                return $magasins;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function save($magasin)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_magasin(code,designation,localisation) 
                    VALUES(:code,:designation,:localisation)"
                );

                $statement->bindParam(':code',$magasin->code);
                $statement->bindParam(':designation',$magasin->designation);
                $statement->bindParam(':localisation',$magasin->localisation);

                $statement->execute();
                                
                return $magasin;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function update($magasin)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_magasin SET designation = :designation,description = :description 
                    WHERE code = :code"
                );

                $statement->bindParam(':code',$magasin->code);
                $statement->bindParam(':designation',$magasin->designation);
                $statement->bindParam(':localisation',$magasin->localisation);

                $statement->execute();
                                
                return $magasin;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function delete($magasin)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_magasin WHERE code = :code"
                );

                $statement->bindParam(':code',$magasin->code);

                $statement->execute();
                                
                return $magasin;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }


    }