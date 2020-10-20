<?php

$file_path = realpath(dirname(__FILE__));

//include Database
include_once $file_path.'../../lib/Database.php';
//include Messages
include_once $file_path.'../../lib/messages.php';

class Clients{

private $db;
private $nom;
private  $prenom;
private  $email;
private  $date_naissance;
private  $telephone;
private  $cin;
private  $adress;
private  $ville;
private  $pays;
private  $n_permis;
private  $code_postal;
private $type_client;

//Execute database connection
public function __construct(){
  $this->db = new Database();
}


//Data collector function
private function clients_data_collect($data){



  $this->nom = $data['nom'];
  $this->prenom = $data['prenom'];
  $this->email = $data['email'];
  $this->date_naissance = $data['date_naissance'];
  $this->telephone = $data['telephone'];
  $this->cin = $data['cin'];
  $this->adress = $data['adress'];
  $this->ville = $data['ville'];
  $this->pays = $data['pays'];
  $this->n_permis = $data['n_permis'];
  $this->code_postal = $data['code_postal'];
  $this->type_client = $data['type_client'];
  /** Filtring data



  **/



}


//Insert new client function
public function insert_client($data){


  //Data collection
  $this->clients_data_collect($data);

  //Check if client exists
  $query ="SELECT cin FROM clients WHERE cin = ?";
  $fetch_client = $this->db->select($query,[$this->cin]);

  if($fetch_client){
    return error_message('ce client déjà existe!');
  }else{

      //Query
      $query = "INSERT INTO  clients(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,n_permis,code_postal,type_client)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

      //Insert new client
      $new_client = $this->db->insert($query,[$this->nom,$this->prenom,$this->email,$this->date_naissance,
                                              $this->telephone,$this->cin,$this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal,$this->type_client]);

      //Error handling
      if($new_client){
        return header("Location:clients.php");
      }else{
        return false;
      }

    }


}


//Update client function
public function update_client($cin,$data){
  //Data Collection
  $this->clients_data_collect($data);

  //Query
  $query = "UPDATE clients SET nom = ?,
                               prenom = ?,
                               email=?,
                               date_naissance =?,
                               telephone=?,
                               cin=?,
                               adress=?,
                               ville=?,
                               pays=?,
                               n_permis=?,
                               code_postal=?,
                               type_client = ?
                               WHERE cin = ?
                               ";
  //Update client
  $client_update = $this->db->update($query ,[
    $this->nom,$this->prenom,$this->email,$this->date_naissance,$this->telephone,
    $this->cin,$this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal,$type_client,$cin
  ]);

  //Error Handeling
  if($client_update){
    return update_success_message();
  }else{
    return update_error_message();
  }
}


//Delete client function
public function delete_client($cin){
  //Query
  $query =  "DELETE  FROM clients WHERE cin = ?";

  //Delete client
  $client_delete = $this->db->delete($query,[$id]);

  //Error handling
  if($client_delete){
    return delete_success_message();
  }else{
    return delete_error_message();
  }
}



//Fetch client function
public function fetch_client($cin){

  //query
  $query = "SELECT * FROM clients WHERE cin =?";

  $fetch_client = $this->db->select($query,[$cin]);

  if($fetch_client){
    return $fetch_client->fetch();
  }else{
    return error_message("ce client n'existe pas");
  }




}

//Fetch all clients function
public function  fetch_allClients(){

    //query
    $query = "SELECT * FROM clients ORDER BY id DESC";
    $fetch_allClients = $this->db->query($query);

    if($fetch_allClients){
      return $fetch_allClients->fetchAll();
    }else{
      return error_message("il n'y a pas des clients pour le moment!");
    }
}

//Reservation history
public function reservationHistory($cin)
{
  //Query
  $query = "SELECT * FROM reservation WHERE cin = ?";

  //Execute
  $reservation_history = $this->db->select($query,[$cin]);

  if($reservation_history){
    return $reservation_history->fetchAll();
  }else{
    return 0;
  }
}


//Location history
public function locationHistory($cin)
{
  //Query
  $query ="SELECT * FROM location WHERE cin = ?";

  //Execute
  $location_history = $this->db->select($query,[$cin]);

  if($location_history){
    return $location_history->fetchAll();
  }else{
    return 0;
  }
}



}








?>
