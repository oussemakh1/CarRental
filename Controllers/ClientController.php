<?php

//include location class
include '../../Modals/Clients.php';


class ClientController{

private $db;


public function __construct()
{
    $this->db = new Database();
}


//Clients
public function Clients()
{
   $client = new Clients();
   return $client->fetch_allClients();
}

//get Client By id
public function getClientByCin($cin)
{
  $client  = new Clients();

  return $client->fetch_client($cin);
}


//get Client reservation history
public function ClientReservationHistory($cin)
{
  $client = new Clients();
  return $client->reservationHistory($cin);
}

//get Client Location history
public function ClientLocationtionHistory($cin)
{
  $client = new Clients();
  return $client->locationHistory($cin);
}


//Client insert
public function client_insert($data)
{
  $client = new Clients();
  return $client->insert_client($data);
}

//Client update
public function client_update($id,$data)
{
   $client = new Clients();
   return $client->update_client($id,$data);
}

//Client Delete
public function client_delete($id)
{
  $client = new Clients();
  return $client->delete_client($id);
}





}



?>
