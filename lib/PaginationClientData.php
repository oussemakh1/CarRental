<?php


class PaginationClientData
{
  private $db;
  private $table;
  private $cin;
  private $total_records;
  private $limit = 5;

  public  function __construct($table,$cin)
  {
    $this->table = $table;
    $this->cin = $cin;
    $this->db = new Database();
    $this->set_total_records();
  }


  public function set_total_records()
  {
    $query = $this->db->query("SELECT * FROM $this->table WHERE n_serie = $this->cin");
    if($query)
    {
      $this->total_records = $query->rowCount();

    }
  }


  public function current_page()
  {
    return isset($_GET['page'.$this->table]) ? (int)$_GET['page'.$this->table] : 1;
  }

   public function get_data()
   {
     $start = 0;
     if($this->current_page() >1){
       $start = ($this->current_page() * $this->limit) - $this->limit;
     }

     $query = "SELECT * FROM  $this->table  WHERE cin = '$this->cin' LIMIT $start,$this->limit";
     $execute = $this->db->query($query);
     if($execute)
     {
       return $execute->fetchAll();
     }
   }

   public function get_pagination_numbers()
   {
     return ceil($this->total_records / $this->limit);
   }


}







?>
