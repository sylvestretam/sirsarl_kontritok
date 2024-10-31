<?php

    require_once("src/model/ligne_activation_pv.php");

    class Ligne_activation_pvRepository
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
                    "SELECT * FROM BTL_ligne_activation_pv"
                );


                $statement->execute();
                
                $ligne_activation_pvs = [];

                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {        
                    $ligne_activation_pv = new ligne_activation_pv();
                    $ligne_activation_pv->activation_id = $row['activation_id'];
                    $ligne_activation_pv->quantite = $row['quantite'];
                    $ligne_activation_pv->valeur = $row['valeur'];
                    $ligne_activation_pv->article = $row['article'];
                    $ligne_activation_pv->unite = $row['unite'];

                    $ligne_activation_pvs[] = $ligne_activation_pv;
                }
                
                return $ligne_activation_pvs;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function save($ligne_activation_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "INSERT INTO BTL_ligne_activation_pv(quantite,valeur,activation_id,article,unite) 
                    VALUES(:quantite,:valeur,:activation_id,:article,:unite)"
                );

                $statement->bindParam(':activation_id',$ligne_activation_pv->activation_id);
                $statement->bindParam(':valeur',$ligne_activation_pv->valeur);
                $statement->bindParam(':quantite',$ligne_activation_pv->quantite);
                $statement->bindParam(':article',$ligne_activation_pv->article);
                $statement->bindParam(':unite',$ligne_activation_pv->unite);

                $statement->execute();
                                
                return $ligne_activation_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }
        
        public function delete($ligne_activation_pv)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_ligne_activation_pv WHERE article = :article AND unite = :unite AND activation_id = :activation_id"
                );

                $statement->bindParam(':unite',$ligne_activation_pv->unite);
                $statement->bindParam(':article',$ligne_activation_pv->article);
                $statement->bindParam(':activation_id',$ligne_activation_pv->activation_id);

                $statement->execute();
                                
                return $ligne_activation_pv;

            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

        public function deleteLigne($activation_id)
        {
            try{
                
                $statement = $this->dbconnect->getConection()->prepare(
                    "DELETE FROM BTL_ligne_activation_pv WHERE activation_id = :activation_id"
                );

                $statement->bindParam(':activation_id',$activation_id);

                $statement->execute();
                                
            }catch(Exception $e){$GLOBALS['error'] = $e->getMessage(); }

        }

    }