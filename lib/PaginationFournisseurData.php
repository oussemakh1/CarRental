<?php


class PaginationFournisseurData
{
  private $db;
  private $service;
  private $total_records;
  private $limit = 5;

  public  function __construct($service)
  {
    $this->service = $service;
    $this->db = new Database();
    $this->set_total_records();
  }


  public function set_total_records()
  {
    if($this->service == 'vente'){
      //Query
      $query = "SELECT * FROM cars INNER JOIN fournisseur ON fournisseur.societe = cars.fournisseur OR fournisseur.civilite = cars.fournisseur WHERE fournisseur.service = '$this->service'";
      $execute = $this->db->query($query);
      if($execute)
      {
        $this->total_records = $execute->rowCount();

      }
    }elseif($this->service == 'reparation'){
      //Query
      $query = "SELECT * FROM reparation INNER JOIN fournisseur ON fournisseur.societe = reparation.mecanicien OR fournisseur.civilite = reparation.mecanicien WHERE fournisseur.service = '$this->service'";
      $execute = $this->db->query($query);

      if($execute)
      {
        $this->total_records = $execute->rowCount();

      }
    }

  }


  public function current_page()
  {
    return isset($_GET['page'.$this->service]) ? (int)$_GET['page'.$this->service] : 1;
  }

   public function get_data()
   {
     $start = 0;
     if($this->current_page() >1){
       $start = ($this->current_page() * $this->limit) - $this->limit;
     }

     if($this->service == 'vente'){
       //Query
       $query = "SELECT * FROM cars INNER JOIN fournisseur ON fournisseur.societe = cars.fournisseur OR fournisseur.civilite = cars.fournisseur WHERE fournisseur.service = '$this->service' LIMIT $start,$this->limit";
       $execute = $this->db->query($query);
       if($execute){
         return $execute->fetchAll();
       }

     }elseif($this->service == 'reparation'){
       //Query
       $query = "SELECT * FROM reparation INNER JOIN fournisseur ON fournisseur.societe = reparation.mecanicien OR fournisseur.civilite = reparation.mecanicien WHERE fournisseur.service = $this->service LIMIT $start,$this->limit";
       $execute = $this->db->query($query);

       if($execute){
         return $execute->fetchAll();
       }
     }

   }

   public function get_pagination_numbers()
   {
     return ceil($this->total_records / $this->limit);
   }


}







?>
