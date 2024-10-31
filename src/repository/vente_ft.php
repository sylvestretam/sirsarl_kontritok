<?php

    require_once("src/model/vente_ft.php");

    class Vente_ftRepository
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
                    "SELECT * FROM BTL_vente_ft"
                );


                $statement->execute();
                
                $vente_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $vente_ft = new Vente_ft();
                    $vente_ft->vente_id = $row['vente_id'];
                    $vente_ft->date_vente = $row['date_vente'];
                    $vente_ft->valeur_total = $row['valeur_total'];
                    $vente_ft->observation = $row['observation'];
                    $vente_ft->enreg_by = $row['enreg_by'];
                    $vente_ft->status = $row['status'];
                    $vente_ft->status_by = $row['status_by'];
                    $vente_ft->food_trucker = $row['food_trucker'];

                    $vente_fts[] = $vente_ft;
                }
                
                return $vente_fts;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function getVenteFT($ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM BTL_vente_ft WHERE food_trucker = :food_trucker"
                );

                $statement->bindParam(':food_trucker',$ft);

                $statement->execute();
                
                $vente_fts = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $vente_ft = new Vente_ft();
                    $vente_ft->vente_id = $row['vente_id'];
                    $vente_ft->date_vente = $row['date_vente'];
                    $vente_ft->valeur_total = $row['valeur_total'];
                    $vente_ft->observation = $row['observation'];
                    $vente_ft->enreg_by = $row['enreg_by'];
                    $vente_ft->status = $row['status'];
                    $vente_ft->status_by = $row['status_by'];
                    $vente_ft->food_trucker = $row['food_trucker'];

                    $vente_fts[] = $vente_ft;
                }
                
                return $vente_fts;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($vente_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_vente_ft(vente_id,date_vente,food_trucker,enreg_by) 
                    VALUES(:vente_id,:date_vente,:food_trucker,:enreg_by)"
                );

                $statement->bindParam(':vente_id',$vente_ft->vente_id);
                $statement->bindParam(':date_vente',$vente_ft->date_vente);
                $statement->bindParam(':enreg_by',$vente_ft->enreg_by);
                $statement->bindParam(':food_trucker',$vente_ft->food_trucker);

                $statement->execute();
                                
                return $vente_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function update($vente_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_vente_ft SET date_vente=:date_vente,valeur_total=:valeur_total,observation=:observation,enreg_by=:enreg_by,status=:status,status_by=:status_by,food_trucker=:food_trucker 
                    WHERE sortie_id,date_sortie"
                );

                $statement->bindParam(':vente_id',$vente_ft->vente_id);
                $statement->bindParam(':date_vente',$vente_ft->date_vente);
                $statement->bindParam(':valeur_total',$vente_ft->valeur_total);
                $statement->bindParam(':magasin',$vente_ft->magasin);
                $statement->bindParam(':observation',$vente_ft->observation);
                $statement->bindParam(':observation',$vente_ft->observation);
                $statement->bindParam(':enreg_by',$vente_ft->enreg_by);
                $statement->bindParam(':status',$vente_ft->status);
                $statement->bindParam(':status_by',$vente_ft->status_by);
                $statement->bindParam(':food_trucker',$vente_ft->food_trucker);

                $statement->execute();
                                
                return $vente_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($vente_ft)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_ligne_vente_ft WHERE vente_ft = :vente_id"
                );
                $statement->bindParam(':vente_id',$vente_ft->vente_id);
                $statement->execute();
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_vente_ft WHERE vente_id = :vente_id"
                );
                $statement->bindParam(':vente_id',$vente_ft->vente_id);
                $statement->execute();
                                
                return $vente_ft;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
    }