<?php

    require_once("src/model/sortie_magasin_pv.php");

    class Sortie_magasin_pvRepository
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
                    "SELECT * FROM BTL_sortie_magasin_pv"
                );


                $statement->execute();
                
                $sortie_magasin_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $sortie_magasin_pv = new Sortie_magasin_pv();
                    $sortie_magasin_pv->sortie_id = $row['sortie_id'];
                    $sortie_magasin_pv->date_sortie = $row['date_sortie'];
                    $sortie_magasin_pv->magasin = $row['magasin'];
                    $sortie_magasin_pv->point_de_vente = $row['point_de_vente'];
                    $sortie_magasin_pv->observation = $row['observation'];
                    $sortie_magasin_pv->enreg_by = $row['enreg_by'];
                    $sortie_magasin_pv->uuid = $row['uuid'];

                    $sortie_magasin_pvs[] = $sortie_magasin_pv;
                }
                
                return $sortie_magasin_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function getSortiesPV($code_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM BTL_sortie_magasin_pv WHERE point_de_vente = :point_de_vente"
                );

                $statement->bindParam(':point_de_vente',$code_pv);

                $statement->execute();
                
                $sortie_magasin_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $sortie_magasin_pv = new Sortie_magasin_pv();
                    $sortie_magasin_pv->sortie_id = $row['sortie_id'];
                    $sortie_magasin_pv->date_sortie = $row['date_sortie'];
                    $sortie_magasin_pv->magasin = $row['magasin'];
                    $sortie_magasin_pv->point_de_vente = $row['point_de_vente'];
                    $sortie_magasin_pv->observation = $row['observation'];
                    $sortie_magasin_pv->enreg_by = $row['enreg_by'];
                    $sortie_magasin_pv->uuid = $row['uuid'];

                    $sortie_magasin_pvs[] = $sortie_magasin_pv;
                }
                
                return $sortie_magasin_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($sortie_magasin_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_sortie_magasin_pv(sortie_id,date_sortie,magasin,point_de_vente,observation,enreg_by,uuid) 
                    VALUES(:sortie_id,:date_sortie,:magasin,:point_de_vente,:observation,:enreg_by,:uuid)"
                );

                $statement->bindParam(':sortie_id',$sortie_magasin_pv->sortie_id);
                $statement->bindParam(':date_sortie',$sortie_magasin_pv->date_sortie);
                $statement->bindParam(':magasin',$sortie_magasin_pv->magasin);
                $statement->bindParam(':point_de_vente',$sortie_magasin_pv->point_de_vente);
                $statement->bindParam(':observation',$sortie_magasin_pv->observation);
                $statement->bindParam(':enreg_by',$sortie_magasin_pv->enreg_by);
                $statement->bindParam(':uuid',$sortie_magasin_pv->uuid);

                $statement->execute();

                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM BTL_sortie_magasin_pv WHERE uuid = :uuid"
                );

                $statement->bindParam(':uuid',$sortie_magasin_pv->uuid);

                $statement->execute();

                if($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $sortie_magasin_pv->sortie_id = $row['sortie_id'];
                }
                                
                return $sortie_magasin_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function update($sortie_magasin_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_sortie_magasin_pv SET magasin=:magasin,point_de_vente=:point_de_vente,observation=:observation,enreg_by=:enreg_by 
                    WHERE sortie_id,date_sortie"
                );

                $statement->bindParam(':sortie_id',$sortie_magasin_pv->sortie_id);
                $statement->bindParam(':date_sortie',$sortie_magasin_pv->date_sortie);
                $statement->bindParam(':magasin',$sortie_magasin_pv->magasin);
                $statement->bindParam(':point_de_vente',$sortie_magasin_pv->point_de_vente);
                $statement->bindParam(':observation',$sortie_magasin_pv->observation);
                $statement->bindParam(':enreg_by',$sortie_magasin_pv->enreg_by);

                $statement->execute();
                                
                return $sortie_magasin_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($sortie_magasin_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_ligne_sortie_pv WHERE sortie_pv = :sortie_id"
                );
                $statement->bindParam(':sortie_id',$sortie_magasin_pv->sortie_id);
                $statement->execute();
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_sortie_magasin_pv WHERE sortie_id = :sortie_id"
                );
                $statement->bindParam(':sortie_id',$sortie_magasin_pv->sortie_id);
                $statement->execute();
                                
                return $sortie_magasin_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }


    }