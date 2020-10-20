<?php

//include cars class
include '../../Modals/Cars.php';


class CarsController{


  private $db;


  //Execute database connection
  public function __construct(){
    $this->db = new Database();
  }



/* Cars */

  //Car List
  public function cars_dispoList(){


    //Query
    $query = "SELECT * FROM cars WHERE cars.n_serie
                                 NOT IN(SELECT reparation.n_serie FROM reparation WHERE reparation.date_sortie_garage > CURRENT_DATE())
                                 AND cars.n_serie NOT IN(SELECT n_serie FROM location WHERE location.date_retour > CURRENT_DATE() AND location.etat_vehicule = 'panne')
                                 AND cars.n_serie NOT IN(SELECT n_serie FROM reservation WHERE reservation.date_retour > CURRENT_DATE())
                                 ORDER BY id DESC ";

    $fetch_cars = $this->db->query($query);
    if($fetch_cars){
      return $fetch_cars->fetchAll();
    }else{
      return error_message('empty');
    }
  }


  //All cars
  public function allCars(){
    $car = new Cars();

    return $car->get_allCars();
  }

  //Get car by id
  public function getCarById($id){

    $car = new Cars();
    return $car->get_CarById($id);

  }

  //Insert car
  public function insertCar($data){
    $car = new Cars();
    return $car->insert_car($data);
  }

  //Update car
  public  function updateCar($id,$data){

    $car = new Cars();
    return $car->update_car($id,$data);

  }

  //Delete Car
  public function deleteCar($id){
    $car = new Cars();

    return $car->delete_car($id);
  }
/** Reservation **/

   //Cars in reservation
   public function reserved_cars(){

      //Query
      $query = "SELECT cars.n_serie,cars.marque,cars.model,reservation.date_depart,reservation.date_retour,reservation.heure_retour,reservation.nb_jour,
                       reservation.id as res_id ,cars.id as car_id,reservation.date_depart,reservation.date_retour FROM cars INNER JOIN reservation ON cars.n_serie = (SELECT reservation.n_serie FROM reservation WHERE reservation.date_retour > CURRENT_DATE())";

      //Extract Data
      $data = $this->db->query($query);

        if($data){

          return $data->fetchAll();

        }else{
          return error_message("il n'y a pas des véhicule reservée pour le moment!");
        }




    }




   //Car reservation  history
   public function reserved_carHistory($n_serie){

    //Query
    $query = "SELECT * FROM reservation WHERE n_serie = ?";

    //Fetch history
    $fetch_history = $this->db->select($query,[$n_serie]);

    if($fetch_history){

        $history_data = $fetch_history->fetchAll();
        return $history_data;

    }else{
      return error_message("no history here!");
    }

  }

   //Most reserved cars
   public function most_reservedCar(){

     //Query
     $query = "SELECT cars.id as carId,cars.marque as carMarque,cars.model FROM cars LEFT JOIN reservation ON cars.n_serie = reservation.n_serie
               AND cars.n_serie = ( SELECT MAX(reservation.n_serie) FROM reservation WHERE reservation.n_serie = cars.n_serie)";

    //Fetch
    $fetch_car = $this->db->query($query);

    if($fetch_car){
      $car_data = $fetch_car->fetch();
      echo $car_data['carMarque'];
    }else{
      echo 'query not working!';
    }

   }

/** Location **/

  //Cars in location
  public function location_cars(){

    //Query
    $query = "SELECT cars.id as carId,cars.n_serie,location.id as locationId,location.marque_vehicule,location.type_client,location.date_depart,location.date_retour,location.heure_retour,location.nb_jour
              FROM cars INNER JOIN location ON cars.n_serie = (SELECT location.n_serie FROM location WHERE location.date_retour > CURRENT_DATE())";

    //Fetch
    $fetch_car = $this->db->query($query);

    if($fetch_car){

      return $fetch_car->fetchAll();

    }else{
        return error_message("il n'y a pas des véhiculs en cours  pour le moment!");
    }
  }

  //Car in location by id
  public function location_car($id){

    $car = new Car();
    $car_data = $car->get_CarById($id);
    echo $car_data['marque'] . '<br>' .
         $car_data['model'] . '<br>' .
         $car_data['carburant'] . '<br>' .
         $car_data['color'] . '<br>' .
         $car_data['categorie'] . '<br>' ;

  }

  //Car location history
  public function location_carHistory($n_serie){

    //Query
    $query = "SELECT * FROM location WHERE n_serie = ? ";

    //Fetch history
    $fetch_history = $this->db->select($query,[$n_serie]);

    if($fetch_history){

        $history_data = $fetch_history->fetchAll();
        return $history_data;

    }else{
      return false;
    }
  }

  //Most Location car
  public function most_locationCar(){

    //Query
    $query = "SELECT cars.id as carId,cars.marque as carMarque,cars.model FROM cars LEFT JOIN location ON cars.n_serie = location.n_serie
              AND cars.n_serie = ( SELECT MAX(location.n_serie) FROM location WHERE location.n_serie = cars.n_serie)";

   //Fetch
   $fetch_car = $this->db->query($query);

   if($fetch_car){
     $car_data = $fetch_car->fetch();
     echo $car_data['carMarque'];
   }else{
     echo 'query not working!';
   }

  }

  //Most profitable car
  public function car_profit($n_serie){

    //Query
    $query  ="SELECT SUM(prix_ht) as profit FROM location WHERE n_serie = ?";

    $fetch_data = $this->db->select($query,[$n_serie]);

    if($fetch_data){
      $data = $fetch_data->fetch();

      echo $data['profit'];
    }else{
      echo 'noth here';
    }

  }



 /** Reparation **/

    //Cars in reparation
    public function cars_reparation(){

        $query = "SELECT *,reparation.id as repId
                  FROM  cars INNER JOIN reparation ON  cars.n_serie =  (SELECT reparation.n_serie FROM reservation WHERE reparation.date_sortie_garage > CURRENT_DATE()) " ;

        $fetch_data = $this->db->query($query);
        if($fetch_data){

            $carInRep = $fetch_data->fetchAll();

            return $carInRep;

        }else{
          echo 'query not working!';
        }

    }

    //Car in reparation
    public function car_reparationHistory($n_serie){
      //Query
      $query =  "SELECT * FROM reparation WHERE n_serie = ?";

      //Fetch
      $fetch = $this->db->select($query,[$n_serie]);

      if($fetch){
        $car_data = $fetch->fetchAll();
        return $car_data;
      }
    }



/** Travaux **/

  //Cars had travaux
  public function car_travaux($n_serie){

    //Query
    $query = "SELECT * FROM travaux_realises WHERE n_serie = ? ";

    $fetch_travaux = $this->db->select($query,[$n_serie]);

    if($fetch_travaux){
      return $fetch_travaux->fetchAll();
    }else{
      return error_message('none');
    }
  }



//Contravention
public function car_contraventionHistory($n_serie)
{
  //Query
  $query = "SELECT * FROM contraventions WHERE n_serie = '$n_serie' ORDER BY id DESC";

  //Fetch
  $fetch = $this->db->query($query);

  if($fetch){
    return $fetch->fetchAll();
  }
}

}




/* Fetch reserved Cars
$carsController->reserved_cars();
*/

/* Fetch reserved Cars by id
$carsController->reserved_car("10");

*/

/* Fetch reserved car history
$carsController->reserved_carHistory();
*/

/* Fetch most reserved car
$carsController->most_reservedCar();
*/




/* Fetch location cars
$carsController->location_cars();
*/

/* Fetch Location car history
$carsController->location_carHistory("122tunise196");
*/

/* Fetch most car location
$carsController->most_locationCar();
*/

/* Fetch Car profit
$carsController->car_profit("122tunise196");
*/




/* Fetch Cars in reparation
$carsController->cars_reparation();
*/
/* Fetch Car in reparation
$carsController->car_reparation("122tunise196");
*/
?>
