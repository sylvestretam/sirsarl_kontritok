<?php

    require_once("src/model/point_de_vente.php");

    class Point_de_venteRepository
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
                    "SELECT * FROM KTT_point_de_vente"
                );


                $statement->execute();
                
                $point_de_ventes = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $point_de_vente = new Point_de_vente();
                    $point_de_vente->code_pv = $row['code_pv'];
                    $point_de_vente->nom = $row['nom'];
                    $point_de_vente->description = $row['description'];
                    $point_de_vente->localisation = $row['localisation'];
                    $point_de_vente->type = $row['type'];
                    $point_de_vente->status = $row['status'];
                    $point_de_vente->status_by = $row['status_by'];

                    $point_de_ventes[] = $point_de_vente;
                }
                
                return $point_de_ventes;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function getOne($code)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM KTT_point_de_vente WHERE code_pv = :code_pv"
                );

                $statement->bindParam(':code_pv',$code);

                $statement->execute();
                

                if($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $point_de_vente = new Point_de_vente();
                    $point_de_vente->code_pv = $row['code_pv'];
                    $point_de_vente->nom = $row['nom'];
                    $point_de_vente->description = $row['description'];
                    $point_de_vente->localisation = $row['localisation'];
                    $point_de_vente->type = $row['type'];
                    $point_de_vente->status = $row['status'];
                    $point_de_vente->status_by = $row['status_by'];

                    return $point_de_vente;
                }
                
                return new Point_de_vente();

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($point_de_vente)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO KTT_point_de_vente(code_pv,nom,description,localisation,type,status,status_by,prospect) 
                    VALUES(:code_pv,:nom,:description,:localisation,:type,:status,:status_by,:prospect)"
                );

                $statement->bindParam(':code_pv',$point_de_vente->code_pv);
                $statement->bindParam(':nom',$point_de_vente->nom);
                $statement->bindParam(':description',$point_de_vente->description);
                $statement->bindParam(':localisation',$point_de_vente->localisation);
                $statement->bindParam(':type',$point_de_vente->type);
                $statement->bindParam(':status',$point_de_vente->status);
                $statement->bindParam(':status_by',$point_de_vente->status_by);

                $statement->execute();
                                
                return $point_de_vente;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function update($point_de_vente)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE KTT_point_de_vente SET designation=:designation,description=:description,localisation=:localisation, 
                    type=:type,status=:status,status_by=:status_by,prospect=:prospect  
                    WHERE code_pv = :code_pv"
                );

                $statement->bindParam(':code_pv',$point_de_vente->code_pv);
                $statement->bindParam(':designation',$point_de_vente->designation);
                $statement->bindParam(':description',$point_de_vente->localisation);
                $statement->bindParam(':localisation',$point_de_vente->designation);
                $statement->bindParam(':type',$point_de_vente->localisation);
                $statement->bindParam(':status',$point_de_vente->designation);
                $statement->bindParam(':status_by',$point_de_vente->localisation);
                $statement->bindParam(':prospect',$point_de_vente->designation);

                $statement->execute();
                                
                return $point_de_vente;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($point_de_vente)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM KTT_ligne_activation_pv WHERE activation_id IN( SELECT activation_id FROM KTT_activation_pv WHERE point_de_vente = :code_pv )"
                );

                $statement->bindParam(':code_pv',$point_de_vente->code_pv);

                $statement->execute();

                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM KTT_activation_pv WHERE point_de_vente = :code_pv"
                );

                $statement->bindParam(':code_pv',$point_de_vente->code_pv);

                $statement->execute();

                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM KTT_point_de_vente WHERE code_pv = :code_pv"
                );

                $statement->bindParam(':code_pv',$point_de_vente->code_pv);

                $statement->execute();
                
                return $point_de_vente;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }


    }