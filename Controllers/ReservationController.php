<?php

//include location class
include '../../Modals/Reservation.php';


class ReservationController{

private $db;


public function __construct()
{
    $this->db = new Database();
}


//Get Reservation by id
public function getReservationById($id){

  $reservation = new Reservation();
  return $reservation->fetch_reservation($id);

}

//Get
public function ReservationSuccess($id)
{
  $reservation = new Reservation();
  return $reservation->ReservationSuccess($id);
}

//Insert Reservation
public function insert_reservation($data){

  $reservation = new Reservation();
  return $reservation->insert_reservation($data);

}


//Update Reservation
public function update_reservation($id,$data){
  $reservation = new Reservation();
  return $reservation->update_reservation($id,$data);
}


//Delete location
public function delete_reservation($id){
  $reservation = new Reservation();
  return $reservation->delete_reservation($id);
}

}



?>
