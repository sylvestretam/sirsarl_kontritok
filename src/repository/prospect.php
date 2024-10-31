<?php

    require_once("src/model/prospect.php");

    class ProspectRepository
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
                    "SELECT * FROM BTL_prospect"
                );


                $statement->execute();
                
                $prospects = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $prospect = new Prospect();
                    $prospect->prospection_id = $row['prospection_id'];
                    $prospect->date_prospection = $row['date_prospection'];
                    $prospect->noms = $row['noms'];
                    $prospect->contact = $row['contact'];
                    $prospect->adresse = $row['adresse'];
                    $prospect->nom_point_de_vente = $row['nom_point_de_vente'];
                    $prospect->type_point_de_pointe = $row['type_point_de_pointe'];
                    $prospect->observation = $row['observation'];
                    $prospect->status = $row['status'];
                    $prospect->food_trucker = $row['food_trucker'];
                    $prospect->status_by = $row['status_by'];

                    $prospects[] = $prospect;
                }
                
                return $prospects;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function getConvertis()
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "SELECT * FROM BTL_prospect WHERE status= 'ACTIVE'"
                );


                $statement->execute();
                
                $prospects = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $prospect = new Prospect();
                    $prospect->prospection_id = $row['prospection_id'];
                    $prospect->date_prospection = $row['date_prospection'];
                    $prospect->noms = $row['noms'];
                    $prospect->contact = $row['contact'];
                    $prospect->adresse = $row['adresse'];
                    $prospect->nom_point_de_vente = $row['nom_point_de_vente'];
                    $prospect->type_point_de_pointe = $row['type_point_de_pointe'];
                    $prospect->observation = $row['observation'];
                    $prospect->status = $row['status'];
                    $prospect->food_trucker = $row['food_trucker'];
                    $prospect->status_by = $row['status_by'];

                    $prospects[] = $prospect;
                }
                
                return $prospects;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($prospect)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_prospect(prospection_id,date_prospection,noms,contact,nom_point_de_vente,type_point_de_pointe,
                    observation,status,food_trucker,status_by) 
                    VALUES(:prospection_id,:date_prospection,:noms,:contact,:nom_point_de_vente,:type_point_de_pointe,
                    :observation,:status,:food_trucker,:status_by)"
                );

                $statement->bindParam(':prospection_id',$prospect->prospection_id);
                $statement->bindParam(':date_prospection',$prospect->date_prospection);
                $statement->bindParam(':noms',$prospect->noms);
                $statement->bindParam(':localisation',$prospect->designation);
                $statement->bindParam(':nom_point_de_vente',$prospect->nom_point_de_vente);
                $statement->bindParam(':type_point_de_pointe',$prospect->type_point_de_pointe);
                $statement->bindParam(':observation',$prospect->observation);
                $statement->bindParam(':status',$prospect->status);
                $statement->bindParam(':food_trucker',$prospect->food_trucker);
                $statement->bindParam(':status_by',$prospect->status_by);

                $statement->execute();
                                
                return $prospect;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function update($prospect)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_prospect SET date_prospection=:date_prospection,noms=:noms, 
                    contact=:contact,nom_point_de_vente=:nom_point_de_vente,type_point_de_pointe=:type_point_de_pointe,
                    observation=:observation,status=:status,food_trucker=:food_trucker,status_by=:status_by  
                    WHERE prospection_id=:prospection_id"
                );

                $statement->bindParam(':prospection_id',$prospect->prospection_id);
                $statement->bindParam(':date_prospection',$prospect->date_prospection);
                $statement->bindParam(':noms',$prospect->noms);
                $statement->bindParam(':localisation',$prospect->designation);
                $statement->bindParam(':nom_point_de_vente',$prospect->nom_point_de_vente);
                $statement->bindParam(':type_point_de_pointe',$prospect->type_point_de_pointe);
                $statement->bindParam(':observation',$prospect->observation);
                $statement->bindParam(':status',$prospect->status);
                $statement->bindParam(':food_trucker',$prospect->food_trucker);
                $statement->bindParam(':status_by',$prospect->status_by);

                $statement->execute();
                                
                return $prospect;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function updateStatus($prospect)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_prospect SET status=:status,status_by=:status_by  
                    WHERE prospection_id=:prospection_id"
                );

                $statement->bindParam(':prospection_id',$prospect->prospection_id);
                $statement->bindParam(':status',$prospect->status);
                $statement->bindParam(':status_by',$prospect->status_by);

                $statement->execute();
                                
                return $prospect;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function delete($prospect)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_prospect WHERE prospection_id = :prospection_id"
                );

                $statement->bindParam(':prospection_id',$prospect->prospection_id);

                $statement->execute();
                                
                return $prospect;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }


    }