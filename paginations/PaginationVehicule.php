<?php



class PaginationVehicule
{
  private $db;
  private $table;
  private $n_serie;
  private $total_records;
  private $limit = 5;

  public  function __construct($table,$n_serie)
  {
    $this->table = $table;
    $this->n_serie = $n_serie;
    $this->db = new Database();
    $this->set_total_records();
  }


  public function set_total_records()
  {
    $query = $this->db->query("SELECT * FROM $this->table WHERE n_serie = $this->n_serie");
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

     $query = "SELECT * FROM  $this->table  WHERE n_serie = '$this->n_serie' LIMIT $start,$this->limit";
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
