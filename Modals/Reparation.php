<?php

//include  database
include_once '../../lib/Database.php';
//include messages
include '../../lib/messages.php';


class Reparation{

private $db;
private $immatriculation;
private $marque;
private $model;
private $type_vehicule;
private $date_mise_circulation;
private $date_entree_garage;
private $date_sortie_garage;
private $kilometrage;
private $niveau_essence;
private $n_serie;
//Execute database connection
public function __construct(){
  $this->db = new Database();
}

//Data collector function
public function reparation_data_collector($data){

  $this->immatriculation = $data['immatriculation'];
  $this->marque = $data['marque'];
  $this->model = $data['model'];
  $this->type_vehicule = $data['type_vehicule'];
  $this->date_mise_circulation = $data['date_mise_circulation'];
  $this->date_entree_garage = $data['date_entree_garage'];
  $this->date_sortie_garage = $data['date_sortie_garage'];
  $this->kilometrage = $data['kilometrage'];
  $this->niveau_essence = $data['niveau_essence'];
  $this->n_serie = $data['n_serie'];

}


//Insert vehicule into reparation
public function insert_reparation($data){
  //Data collector
  $this->reparation_data_collector($data);

  //Query
  $query = "INSERT INTO reparation(immatriculation,marque,model,
                        type_vehicule,date_mise_circulation,date_entree_garage,
                        date_sortie_garage,kilometrage,niveau_essence,n_serie)
                        VALUES(?,?,?,?,?,?,?,?,?,?)";
  //Insert reparation
  $new_reparation = $this->db->insert($query,[
    $this->immatriculation,$this->marque,$this->model,$this->type_vehicule,$this->date_mise_circulation,
    $this->date_entree_garage,$this->date_sortie_garage,
    $this->kilometrage,$this->niveau_essence,$this->n_serie
  ]);

  //Error handling
  if($new_reparation){
    return insert_success_message();
  }else{
    return insert_error_message();
  }
}


//Update reparation
public function update_reparation($id,$data){
  //Data collector
  $this->reparation_data_collector($data);

  //Query
  $query = "UPDATE reparation SET immatriculation=?,
                                  marque=?,
                                  model=?,
                                  type_vehicule=?,
                                  date_mise_circulation=?,
                                  date_entree_garage=?,
                                  date_sortie_garage=?,
                                  kilometrage=?,
                                  niveau_essence=?,
                                  n_serie=?
                                  WHERE id = ?
                                  ";

  //Update reparation
  $reparation_update = $this->db->update($query,[
    $this->immatriculation,$this->marque,$this->model,$this->type_vehicule,$this->date_mise_circulation,
    $this->date_entree_garage,$this->date_sortie_garage,
    $this->kilometrage,$this->niveau_essence,$this->n_serie,$id
  ]);

  //Error handling
  if($reparation_update){
    return update_success_message();
  }else{
    return update_error_message();
  }
}

//Delete reparation
public function delete_reparation($id){
  //Query
  $query = "DELETE  FROM reparation WHERE id = ?";

  //Delete reparation
  $reparation_delete = $this->db->delete($query,[$id]);

  //Error handling
  if($reparation_delete){
    return delete_success_message();
  }else{
    return delete_error_message();
}
}

//Fetch reparation by id
public function fetch_reparation($id){

  //Query
  $query = "SELECT * FROM reparation WHERE id = ?";

  //Fetch
  $fetch_reparation = $this->db->select($query,[$id]);

  if($fetch_reparation){
    return $fetch_reparation->fetch();
  }else{
    return error_message("cette reparation n'existe pas");
  }
}

//Fetch all reparation
public function fetch_allReparation(){

  //Query
  $query = "SELECT * FROM  reparation";

  $fetch_allReparation = $this->db->query($query);

  if($fetch_allReparation){
    return $fetch_allReparation->fetchAll();
  }else{
    return error_message("il n'y a pas des reparation pour le moment!");
  }
}


}
