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
            $this->ChangeDevisStat();
            $this->License();

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

        public function query($query)
        {
            return $this->link->query($query);
        }


        private function License()
        {

              $query = "DELETE activation FROM activation WHERE CURRENT_DATE = end_date";

              $prepare = $this->query($query);

        }


        private function ChangeDevisStat()
        {
          //Query
          $query = "UPDATE devis set devis_status ='Failed' WHERE date_validite < CURRENT_DATE ";

          //Exectute
          $update_devis = $this->query($query);

        }


}

?>
