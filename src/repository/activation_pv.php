<?php

    require_once("src/model/activation_pv.php");

    class Activation_pvRepository
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
                    "SELECT * FROM BTL_activation_pv"
                );


                $statement->execute();
                
                $activation_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $activation_pv = new Activation_pv();
                    $activation_pv->activation_id = $row['activation_id'];
                    $activation_pv->date_activation = $row['date_activation'];
                    $activation_pv->valeur = $row['valeur'];
                    $activation_pv->point_de_vente = $row['point_de_vente'];

                    $activation_pvs[] = $activation_pv;
                }
                
                return $activation_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($activation_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_activation_pv(date_activation,valeur,point_de_vente) 
                    VALUES(:date_activation,:valeur,:point_de_vente)"
                );

                $statement->bindParam(':date_activation',$activation_pv->date_activation);
                $statement->bindParam(':valeur',$activation_pv->valeur);
                $statement->bindParam(':point_de_vente',$activation_pv->point_de_vente);

                $statement->execute();

                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM BTL_activation_pv WHERE point_de_vente = :point_de_vente"
                );
                $statement->bindParam(':point_de_vente',$activation_pv->point_de_vente);
                $statement->execute();                
                if($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $activation_pv->activation_id = $row['activation_id'];  
                }

                return $activation_pv;
            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function update($activation_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_activation_pv SET date_activation = :date_activation,valeur = :valeur,point_de_vente = :point_de_vente 
                    WHERE activation_id = :activation_id"
                );

                $statement->bindParam(':activation_id',$activation_pv->activation_id);
                $statement->bindParam(':date_activation',$activation_pv->date_activation);
                $statement->bindParam(':valeur',$activation_pv->valeur);
                $statement->bindParam(':point_de_vente',$activation_pv->point_de_vente);

                $statement->execute();
                                
                return $activation_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($activation_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_activation_pv WHERE activation_id = :activation_id"
                );

                $statement->bindParam(':activation_id',$activation_pv->activation_id);

                $statement->execute();
                                
                return $activation_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }


    }