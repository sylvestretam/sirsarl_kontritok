<?php

    require_once("src/model/vente_pv.php");

    class Vente_pvRepository
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
                    "SELECT * FROM BTL_vente_pv"
                );


                $statement->execute();
                
                $vente_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $vente_pv = new Vente_pv();
                    $vente_pv->vente_id = $row['vente_id'];
                    $vente_pv->date_vente = $row['date_vente'];
                    $vente_pv->valeur_total = $row['valeur_total'];
                    $vente_pv->observation = $row['observation'];
                    $vente_pv->enreg_by = $row['enreg_by'];
                    $vente_pv->status = $row['status'];
                    $vente_pv->status_by = $row['status_by'];
                    $vente_pv->point_vente = $row['point_vente'];

                    $vente_pvs[] = $vente_pv;
                }
                
                return $vente_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function getVentespv($pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM BTL_vente_pv WHERE point_vente = :point_vente"
                );

                $statement->bindParam(':point_vente',$pv);

                $statement->execute();
                
                $vente_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $vente_pv = new Vente_pv();
                    $vente_pv->vente_id = $row['vente_id'];
                    $vente_pv->date_vente = $row['date_vente'];
                    $vente_pv->valeur_total = $row['valeur_total'];
                    $vente_pv->observation = $row['observation'];
                    $vente_pv->enreg_by = $row['enreg_by'];
                    $vente_pv->status = $row['status'];
                    $vente_pv->status_by = $row['status_by'];
                    $vente_pv->point_vente = $row['point_vente'];

                    $vente_pvs[] = $vente_pv;
                }
                
                return $vente_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($vente_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_vente_pv(vente_id,date_vente,point_vente,enreg_by) 
                    VALUES(:vente_id,:date_vente,:point_vente,:enreg_by)"
                );

                $statement->bindParam(':vente_id',$vente_pv->vente_id);
                $statement->bindParam(':date_vente',$vente_pv->date_vente);
                $statement->bindParam(':enreg_by',$vente_pv->enreg_by);
                $statement->bindParam(':point_vente',$vente_pv->point_vente);

                $statement->execute();
                                
                return $vente_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function update($vente_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_vente_pv SET date_vente=:date_vente,valeur_total=:valeur_total,observation=:observation,enreg_by=:enreg_by,status=:status,status_by=:status_by,point_vente=:point_vente 
                    WHERE vente_id = :vente_id"
                );

                $statement->bindParam(':vente_id',$vente_pv->vente_id);
                $statement->bindParam(':date_vente',$vente_pv->date_vente);
                $statement->bindParam(':valeur_total',$vente_pv->valeur_total);
                $statement->bindParam(':magasin',$vente_pv->magasin);
                $statement->bindParam(':observation',$vente_pv->observation);
                $statement->bindParam(':observation',$vente_pv->observation);
                $statement->bindParam(':enreg_by',$vente_pv->enreg_by);
                $statement->bindParam(':status',$vente_pv->status);
                $statement->bindParam(':status_by',$vente_pv->status_by);
                $statement->bindParam(':point_vente',$vente_pv->point_vente);

                $statement->execute();
                                
                return $vente_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($vente_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_ligne_vente_pv WHERE vente_pv = :vente_id"
                );
                $statement->bindParam(':vente_id',$vente_pv->vente_id);
                $statement->execute();
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_vente_pv WHERE vente_id = :vente_id"
                );
                $statement->bindParam(':vente_id',$vente_pv->vente_id);
                $statement->execute();
                                
                return $vente_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

    }