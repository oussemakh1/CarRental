<?php
include'../../config/config.php';

class Database
{
        public $host = DB_HOST;
        public $user = DB_USER;
        public $pass  = DB_PASS;
        public $dbname = DB_NAME;

        public $link;
        public $error;


        public function __construct()
        {
            $this->connectDB();
            //Failed reservation
            $this->reservationFailed();
            //Non valid devis
            $this->nonValidDevis();

            /*$this->ChangeDevisStat();*/
            /*$this->License();*/

        }




        private function connectDB()
        {
                try{

                    $dsn = "mysql:host=" .$this->host .";dbname=" .$this->dbname;
                    $this->link = new PDO($dsn,$this->user,$this->pass);
                    $this->link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                    return $this->link;

                }
                catch(Exception $e){

                    $this->error = "Connection fail! " . $e->getMessage();
                    return false;
                }

        }



        public function select($query,array $cols)
        {
            $stmt = $this->link->prepare($query);
            $stmt->execute($cols);

            if($stmt->rowCount() > 0){
                return $stmt;
            }else{
                return false;
            }
        }


        public function insert($query,array $cols){

            $insert_row = $this->link->prepare($query);
            $insert_row->execute($cols);
            if($insert_row){
                return $insert_row;
            }else{
                return false;
            }
        }


        public function update($query,array $cols)
        {
            $update_row = $this->link->prepare($query);
            $update_row->execute($cols);
            if($update_row){
                return $update_row;
            }else{
                return false;
            }
        }

        public function delete($query,array $cols){

            $delete_row = $this->link->prepare($query);
            $delete_row->execute($cols);

            if($delete_row){
                return $delete_row;
            }else{
                return false;
            }
        }

        public function query(string $q)
        {
            if($q != null )
            {
                return $this->link->query($q);
            }
        }


    //Failed reservation in devis
    private function reservationFailed()
    {
        //Query
        $query =" UPDATE reservation INNER JOIN devis ON reservation.id = devis.reservation_id 
                  SET reservation.status = 'Failed'
                  WHERE devis.date_validite < CURRENT_DATE() AND reservation.isDone = 'notDone'
                  "
                ;

        //Execute
        return $FailedReservation = $this->link->query($query);
    }

    //Non valid deis
    private function nonValidDevis () {

            //Query
        $query = "UPDATE devis INNER JOIN reservation ON reservation.id = devis.reservation_id SET devis.devis_status ='Failed' WHERE reservation.status = 'Failed' ";
        return $NonValidDevis = $this->link->query($query);
    }




}

?>
