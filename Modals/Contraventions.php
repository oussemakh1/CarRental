<?php


//Include database
include_once '../../lib/Database.php';



class Contraventions{
private $db;
private $date_enregistrement;
private $avis_contravention;
private $date_contravention;
private $nature_contravention;
private $lieu_infraction;
private $commune_infraction;
private $montant_infraction;
private $observation;
private $n_serie;

//Execute database connection
public function __construct(){
  $this->db = new Database();
}

//Data collector function
public function Contraventions_data_collect($data){

  $this->date_enregistrement = $data['date_enregistrement'];
  $this->avis_contravention = $data['avis_contravention'];
  $this->date_contravention = $data['date_contravention'];
  $this->nature_contravention = $data['nature_contravention'];
  $this->lieu_infraction = $data['lieu_infraction'];
  $this->commune_infraction = $data['commune_infraction'];
  $this->montant_infraction = $data['montant_infraction'];
  $this->observation = $data['observation'];
  $this->n_serie = $data['n_serie'];


}



//Insert contravention
public function insert_contravention($data){
  //Data collector
  $this->Contraventions_data_collect($data);

  //Query
  $query = "INSERT INTO contraventions(date_enregistrement,avis_contravention,date_contravention,nature_contravention,lieu_infraction,commune_infraction,montant_infraction,observation,n_serie)
                        VALUES(?,?,?,?,?,?,?,?,?)";

  //Insert new contraventions
  $new_contravention = $this->db->insert($query,[
    $this->date_enregistrement,$this->avis_contravention,$this->date_contravention,$this->nature_contravention,$this->lieu_infraction,
    $this->commune_infraction,$this->montant_infraction,$this->observation,$this->n_serie
  ]);

  //Error handling
  if($new_contravention->rowCount() >0 ){
    return insert_success_message();
  }else{
    return insert_error_message();
  }




}

//Update contravention
public function update_contravention($id,$data){
  //Data collector
  $this->Contraventions_data_collect($data);

  //Query
  $query = "UPDATE contraventions SET date_enregistrement =?,
                                      avis_contravention =?,
                                      date_contravention=?,
                                      nature_contravention=?,
                                      lieu_infraction=?,
                                      commune_infraction=?,
                                      montant_infraction=?,
                                      observation=?,
                                      n_serie=?
                                      WHERE id = ?
                                       ";

  //Update contravention
  $contravention_update = $this->db->update($query,[
    $this->date_enregistrement,$this->avis_contravention,$this->date_contravention,$this->nature_contravention,$this->lieu_infraction,
    $this->commune_infraction,$this->montant_infraction,$this->observation,$this->n_serie,$id

  ]);

  //Error handling
  if($contravention_update){
    return header("Location:contravention_info.php?id=$id");
  }else{
    return false;
  }





}


//Delete contravention
public function delete_contravention($id){
  $query = "DELETE  FROM contraventions WHERE id = ?";
  $contravention_delete = $this->db->delete($query,[$id]);

  //Error handling
  if($contravention_delete->rowCount() >0){
    return delete_success_message();
  }else{
    return delete_error_message();
  }
}


//Fetch contravention function
public function fetch_contravention($id){

  //Query
  $query = "SELECT * FROM contraventions WHERE id = ?";

  //Fetch contravention
  $fetch_contravention = $this->db->select($query,[$id]);


  if($fetch_contravention){
    return $fetch_contravention->fetch();
  }else{
    return error_message("cette contravention  n'existe pas");
  }
}


//Fetch all contraventions function
public function fetch_allContravention(){

  //Query
  $query = "SELECT * FROM contraventions ORDER BY id DESC";

  //Fetch All
  $fetch_contraventions = $this->db->query($query);

  if($fetch_contraventions){
    return $fetch_contraventions->fetchAll();
  }else{
    return error_message("il n'y a pas des contravention pour le moment!");
  }
}

}
