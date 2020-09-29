<?php

//include location class
include '../../Modals/Location.php';


class LocationController{

private $db;


public function __construct()
{
    $this->db = new Database();
}


//Get location by id
public function getLocationById($id){

  $location = new Location();
  return $location->fetch_location($id);

}

//Insert location
public function insert_location($data){

  $location = new Location();
  return $location->insert_Location($data);

}




}



?>
