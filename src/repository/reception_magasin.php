<?php

    require_once("src/model/reception_magasin.php");

    class Reception_magasinRepository
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
                    "SELECT * FROM BTL_reception_magasin"
                );


                $statement->execute();
                
                $reception_magasins = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $reception_magasin = new Reception_magasin();
                    $reception_magasin->reception_id = $row['reception_id'];
                    $reception_magasin->date_reception = $row['date_reception'];
                    $reception_magasin->magasin = $row['magasin'];
                    $reception_magasin->uuid = $row['uuid'];

                    $reception_magasins[] = $reception_magasin;
                }
                
                return $reception_magasins;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($reception_magasin)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_reception_magasin(reception_id,date_reception,magasin,uuid) 
                    VALUES(:reception_id,:date_reception,:magasin,:uuid)"
                );

                $statement->bindParam(':reception_id',$reception_magasin->reception_id);
                $statement->bindParam(':date_reception',$reception_magasin->date_reception);
                $statement->bindParam(':magasin',$reception_magasin->magasin);
                $statement->bindParam(':uuid',$reception_magasin->uuid);

                $statement->execute();

                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM BTL_reception_magasin WHERE uuid = :uuid"
                );

                $statement->bindParam(':uuid',$reception_magasin->uuid);
                $statement->execute();

                if($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $reception_magasin->reception_id = $row['reception_id'];
                }
                                                
                return $reception_magasin;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function update($reception_magasin)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_reception_magasin SET date_reception=:date_reception,magasin=:magasin 
                    WHERE reception_id=:reception_id"
                );

                $statement->bindParam(':reception_id',$reception_magasin->reception_id);
                $statement->bindParam(':date_reception',$reception_magasin->date_reception);
                $statement->bindParam(':magasin',$reception_magasin->magasin);

                $statement->execute();
                                
                return $reception_magasin;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($reception_magasin)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_ligne_reception_magasin WHERE reception = :reception_id"
                );
                $statement->bindParam(':reception_id',$reception_magasin->reception_id);
                $statement->execute();
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_reception_magasin WHERE reception_id = :reception_id"
                );
                $statement->bindParam(':reception_id',$reception_magasin->reception_id);
                $statement->execute();
                                
                return $reception_magasin;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }


    }