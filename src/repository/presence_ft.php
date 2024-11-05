<?php

    require_once("src/model/presence_ft.php");

    class Presence_ftRepository
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
                    "SELECT * FROM KTT_presence_md"
                );


                $statement->execute();
                
                $presence_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $presence_ft = new presence_ft();
                    $presence_ft->date_jour = $row['date_jour'];
                    $presence_ft->observation = $row['observation'];

                    $presence_fts[] = $presence_ft;
                }
                
                return $presence_fts;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($presence_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO KTT_presence_md(date_jour,observation) 
                    VALUES(:date_jour,:observation)"
                );

                $statement->bindParam(':date_jour',$presence_ft->date_jour);
                $statement->bindParam(':observation',$presence_ft->observation);

                $statement->execute();
                                
                return $presence_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($presence_ft)
        {
            try{
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM KTT_ligne_presence_md WHERE date_presence = :date_jour"
                );

                $statement->bindParam(':date_jour',$presence_ft->date_jour);

                $statement->execute();

                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM KTT_presence_md WHERE date_jour = :date_jour"
                );

                $statement->bindParam(':date_jour',$presence_ft->date_jour);

                $statement->execute();
                                
                return $presence_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }


    }