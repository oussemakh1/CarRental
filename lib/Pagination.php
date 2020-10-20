<?php

class Pagination
{
  private $db;
  private $table;
  private $total_records;
  private $limit = 1;

  public  function __construct($table)
  {
    $this->table = $table;
    $this->db = new Database();
    $this->set_total_records();
  }


  public function set_total_records()
  {
    $query = $this->db->query("SELECT id FROM $this->table");
    $this->total_records = $query->rowCount();
  }


  public function current_page()
  {
    return isset($_GET['page']) ? (int)$_GET['page'] : 1;
  }

   public function get_data()
   {
     $start = 0;
     if($this->current_page() >1){
       $start = ($this->current_page() * $this->limit) - $this->limit;
     }

     $query = "SELECT * FROM  $this->table LIMIT $start,$this->limit";
     $execute = $this->db->query($query);
     return $execute->fetchAll();
   }

   public function get_pagination_numbers()
   {
     return ceil($this->total_records / $this->limit);
   }


}



?>
