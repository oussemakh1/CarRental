<?php

class PaginationVehiculeManagaement
{
  private $db;
  private $total_records_cardispo;
  private $total_records_rented;
  private $total_records_reserved;
  private $total_records_inreparation;
  private $limit = 5;

  public  function __construct()
  {
    $this->db = new Database();
    $this->set_total_records_cardispo();
    $this->set_total_records_rented();
    $this->set_total_records_reserved();
    $this->set_total_records_inreparation();
  }




  //Get current page function
  public function current_page_cardispo()
  {
    return isset($_GET['page_cardispo']) ? (int)$_GET['page_cardispo'] : 1;
  }

  public function current_page_carrented()
  {
    return isset($_GET['page_carrented']) ? (int)$_GET['page_carrented'] : 1;
  }

  public function current_page_carreserved()
  {
    return isset($_GET['page_carreserved']) ? (int)$_GET['page_carreserved'] : 1;
  }

  public function current_page_carinreparation()
  {
    return isset($_GET['page_carinreparation']) ? (int)$_GET['page_carinreparation'] : 1;
  }




/** GET DATA FUNCTIONS **/
  //Get cars dispo data
   public function get_data_carsdispo()
   {
     $start = 0;
     if($this->current_page_cardispo() >1){
       $start = ($this->current_page_cardispo() * $this->limit) - $this->limit;
     }

     $query = "SELECT * FROM cars WHERE cars.n_serie
                                  NOT IN(SELECT reparation.n_serie FROM reparation WHERE reparation.date_sortie_garage > CURRENT_DATE())
                                  AND cars.n_serie NOT IN(SELECT n_serie FROM location WHERE location.date_retour > CURRENT_DATE())
                                  AND cars.n_serie NOT IN(SELECT n_serie FROM reservation WHERE reservation.date_retour > CURRENT_DATE() AND reservation.isDone='not done')
                                  ORDER BY cars.id DESC  LIMIT $start,$this->limit ";
     $execute = $this->db->query($query);
     if($execute){
       return $execute->fetchAll();
     }
   }


   //Get cars reserved  data
    public function get_data_carsreserved()
    {
      $start = 0;
      if($this->current_page_carreserved() >1){
        $start = ($this->current_page_carreserved() * $this->limit) - $this->limit;
      }

      $query = "SELECT cars.n_serie,cars.marque,cars.model,reservation.cin as res_cin,reservation.date_depart,reservation.date_retour,reservation.heure_retour,reservation.nb_jour,
			reservation.id AS res_id ,cars.id AS car_id,reservation.date_depart,reservation.date_retour FROM cars INNER JOIN reservation ON
       cars.n_serie IN (SELECT reservation.n_serie FROM reservation WHERE reservation.date_retour > CURDATE()
			AND reservation.isDone = 'notDone') ORDER BY reservation.id DESC LIMIT $start,$this->limit";
      $execute = $this->db->query($query);
      if($execute){
      return $execute->fetchAll();
    }
    }


    //Get cars encours  data
     public function get_data_carsencours()
     {
       $start = 0;
       if($this->current_page_carrented() >1){
         $start = ($this->current_page_carrented() * $this->limit) - $this->limit;
       }

       $query = "SELECT cars.id as carId,cars.n_serie,location.id as locationId,cars.*,location.* 
                    FROM cars INNER JOIN location ON cars.n_serie = location.n_serie WHERE 
                        location.date_retour > CURRENT_DATE ()";
       $execute = $this->db->query($query);
       if($execute){
         return $execute->fetchAll();
       }
     }


     //Get cars inreparation data
     public function get_data_carsinreparation()
     {
       $start = 0;
       if($this->current_page_carinreparation() >1){
         $start = ($this->current_page_carinreparation() * $this->limit) - $this->limit;
       }

       $query = "SELECT *,reparation.id as repId
                 FROM  cars INNER JOIN reparation ON  cars.n_serie IN  (SELECT reparation.n_serie FROM reservation WHERE reparation.date_sortie_garage > CURRENT_DATE())
                       ORDER BY reparation.id DESC  LIMIT $start,$this->limit";
       $execute = $this->db->query($query);
       if($execute){
       return $execute->fetchAll();
     }
     }
/** END GET DATA FUNCTIONS **/

/** GET TOTAL RECORDS FUNCTIONS **/
//Cars disp total records
public function set_total_records_cardispo()
{
  $query = $this->db->query("SELECT * FROM cars WHERE cars.n_serie
                               NOT IN(SELECT reparation.n_serie FROM reparation WHERE reparation.date_sortie_garage > CURRENT_DATE())
                               AND cars.n_serie NOT IN(SELECT n_serie FROM location WHERE location.date_retour > CURRENT_DATE() AND location.etat_vehicule = 'panne')
                               AND cars.n_serie NOT IN(SELECT n_serie FROM reservation WHERE reservation.date_retour > CURRENT_DATE())
                               ORDER BY id DESC ");
  if($query){
    $this->total_records_carsdispo = $query->rowCount();
  }
}


//Cars reserved total records
public function set_total_records_reserved()
{
  $query = $this->db->query("SELECT cars.n_serie,cars.marque,cars.model,reservation.date_depart,reservation.date_retour,reservation.heure_retour,reservation.nb_jour,
                   reservation.id as res_id ,cars.id as car_id,reservation.date_depart,reservation.date_retour FROM cars INNER JOIN
                   reservation ON cars.n_serie = (SELECT reservation.n_serie FROM reservation WHERE reservation.date_retour > CURRENT_DATE() AND reservation.status = 'Succed')
                  ORDER BY id DESC ");
  if($query){
    $this->set_total_records_reserved = $query->rowCount();
  }
}



//Cars en cours  total records
public function set_total_records_rented()
{
  $query = $this->db->query("SELECT cars.id as carId,cars.n_serie,location.id as locationId,location.marque_vehicule,location.type_client,location.date_depart,location.date_retour,location.heure_retour,location.nb_jour
            FROM cars INNER JOIN location ON cars.n_serie = (SELECT location.n_serie FROM location WHERE location.date_retour > CURRENT_DATE())
                  ORDER BY id DESC");
  if($query){
    $this->total_records_rented = $query->rowCount();
  }
}


//Cars in reparation total records
public function set_total_records_inreparation()
{
  $query = $this->db->query("SELECT *,reparation.id as repId
            FROM  cars INNER JOIN reparation ON  cars.n_serie =  (SELECT reparation.n_serie FROM reservation WHERE reparation.date_sortie_garage > CURRENT_DATE())
                  ORDER BY id DESC  ");
  if($query)
  {
    $this->total_records_inreparation = $query->rowCount();

  }
}

/** END GET TOTAL RECORDS FUNCTIONS **/
   //Get number of pages function
   public function get_pagination_numbers_dispocars()
   {
     return ceil($this->total_records_carsdispo / $this->limit);
   }

   public function get_pagination_numbers_rented()
   {
     return ceil($this->total_records_rented / $this->limit);
   }

   public function get_pagination_numbers_reserved()
   {
     return ceil($this->total_records_reserved / $this->limit);
   }

   public function get_pagination_numbers_inreparation()
   {
     return ceil($this->total_records_inreparation / $this->limit);
   }
}






?>
