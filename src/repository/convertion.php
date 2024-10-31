<?php

    require_once("src/model/convertion.php");

    class ConvertionRepository
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
                    "SELECT * FROM BTL_convertion"
                );


                $statement->execute();
                
                $convertions = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $convertion = new Convertion();
                    $convertion->convertion_id = $row['convertion_id'];
                    $convertion->date_convertion = $row['date_convertion'];
                    $convertion->quantite_converti = $row['quantite_converti'];
                    $convertion->quantite_obtenu = $row['quantite_obtenu'];
                    $convertion->observation = $row['observation'];
                    $convertion->unite_converti = $row['unite_converti'];
                    $convertion->unite_obtenu = $row['unite_obtenu'];
                    $convertion->article = $row['article'];
                    $convertion->magasin = $row['magasin'];
                    $convertion->enreg_by = $row['enreg_by'];

                    $convertions[] = $convertion;
                }
                
                return $convertions;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function save($convertion)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_convertion(date_convertion,quantite_converti,quantite_obtenu,observation,unite_converti,unite_obtenu,article,magasin,enreg_by) 
                    VALUES(:date_convertion,:quantite_converti,:quantite_obtenu,:observation,:unite_converti,:unite_obtenu,:article,:magasin,:enreg_by)"
                );

                $statement->bindParam(':date_convertion',$convertion->date_convertion);
                $statement->bindParam(':quantite_converti',$convertion->quantite_converti);
                $statement->bindParam(':quantite_obtenu',$convertion->quantite_obtenu);
                $statement->bindParam(':observation',$convertion->observation);
                $statement->bindParam(':designation',$convertion->designation);
                $statement->bindParam(':unite_converti',$convertion->unite_converti);
                $statement->bindParam(':unite_obtenu',$convertion->unite_obtenu);
                $statement->bindParam(':article',$convertion->article);
                $statement->bindParam(':magasin',$convertion->magasin);
                $statement->bindParam(':enreg_by',$convertion->enreg_by);

                $statement->execute();
                                
                return $convertion;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function update($convertion)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "UPDATE BTL_convertion SET date_convertion=:date_convertion,quantite_converti=:quantite_converti,quantite_obtenu=:quantite_obtenu,
                    observation=:observation,unite_converti=:unite_converti,unite_obtenu=:unite_obtenu,article=:article,magasin=:magasin,enreg_by=:enreg_by 
                    WHERE convertion_id = :convertion_id"
                );

                $statement->bindParam(':convertion_id',$convertion->convertion_id);
                $statement->bindParam(':date_convertion',$convertion->date_convertion);
                $statement->bindParam(':quantite_converti',$convertion->quantite_converti);
                $statement->bindParam(':quantite_obtenu',$convertion->quantite_obtenu);
                $statement->bindParam(':observation',$convertion->observation);
                $statement->bindParam(':designation',$convertion->designation);
                $statement->bindParam(':unite_converti',$convertion->unite_converti);
                $statement->bindParam(':unite_obtenu',$convertion->unite_obtenu);
                $statement->bindParam(':article',$convertion->article);
                $statement->bindParam(':magasin',$convertion->magasin);
                $statement->bindParam(':enreg_by',$convertion->enreg_by);

                $statement->execute();
                                
                return $convertion;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }

        public function delete($convertion)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_convertion WHERE convertion_id = :convertion_id"
                );

                $statement->bindParam(':convertion_id',$convertion->convertion_id);

                $statement->execute();
                                
                return $convertion;

            }catch(Exception $e){$GLOBALS['erro'] = $e->getMessage(); }

        }


    }