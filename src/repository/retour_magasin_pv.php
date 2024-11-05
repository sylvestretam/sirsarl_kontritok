<?php

    require_once("src/model/retour_magasin_pv.php");

    class Retour_magasin_pvRepository
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
                    "SELECT * FROM KTT_retour_magasin_pv"
                );


                $statement->execute();
                
                $retour_magasin_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $retour_magasin_pv = new Retour_magasin_pv();
                    $retour_magasin_pv->retour_id = $row['retour_id'];
                    $retour_magasin_pv->date_retour = $row['date_retour'];
                    $retour_magasin_pv->magasin = $row['magasin'];
                    $retour_magasin_pv->point_de_vente = $row['point_de_vente'];
                    $retour_magasin_pv->observation = $row['observation'];
                    $retour_magasin_pv->enreg_by = $row['enreg_by'];
                    $retour_magasin_pv->uuid = $row['uuid'];

                    $retour_magasin_pvs[] = $retour_magasin_pv;
                }
                
                return $retour_magasin_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($retour_magasin_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO KTT_retour_magasin_pv(date_retour,magasin,point_de_vente,observation,enreg_by,retour_id) 
                    VALUES(:date_retour,:magasin,:point_de_vente,:observation,:enreg_by,:retour_id)"
                );

                $statement->bindParam(':date_retour',$retour_magasin_pv->date_retour);
                $statement->bindParam(':magasin',$retour_magasin_pv->magasin);
                $statement->bindParam(':point_de_vente',$retour_magasin_pv->point_de_vente);
                $statement->bindParam(':observation',$retour_magasin_pv->observation);
                $statement->bindParam(':enreg_by',$retour_magasin_pv->enreg_by);
                $statement->bindParam(':retour_id',$retour_magasin_pv->retour_id);

                $statement->execute();
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM KTT_retour_magasin_pv WHERE uuid = :uuid"
                );

                $statement->bindParam(':uuid',$retour_magasin_pv->uuid);

                $statement->execute();

                if($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $retour_magasin_pv->retour_id = $row['retour_id'];
                }

                return $retour_magasin_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function update($retour_magasin_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE KTT_retour_magasin_pv SET magasin=:magasin,point_de_vente=:point_de_vente,observation=:observation,enreg_by=:enreg_by 
                    WHERE retour_id,date_retour"
                );

                $statement->bindParam(':retour_id',$retour_magasin_pv->retour_id);
                $statement->bindParam(':date_retour',$retour_magasin_pv->date_retour);
                $statement->bindParam(':magasin',$retour_magasin_pv->magasin);
                $statement->bindParam(':point_de_vente',$retour_magasin_pv->point_de_vente);
                $statement->bindParam(':observation',$retour_magasin_pv->observation);
                $statement->bindParam(':enreg_by',$retour_magasin_pv->enreg_by);

                $statement->execute();
                                
                return $retour_magasin_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($retour_magasin_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM KTT_ligne_retour_pv WHERE retour_pv = :retour_id"
                );
                $statement->bindParam(':retour_id',$retour_magasin_pv->retour_id);
                $statement->execute();
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM KTT_retour_magasin_pv WHERE retour_id = :retour_id"
                );
                $statement->bindParam(':retour_id',$retour_magasin_pv->retour_id);
                $statement->execute();
                                
                return $retour_magasin_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }


    }