<?php

 //Include databse
 include_once '../../lib/Database.php';



class Reservation{

private $db;
private $nom;
private $prenom;
private $adress;
private $email;
private $date_naissance;
private $telephone;
private $cin;
private $pays;
private $ville;
private $code_postal;
private $n_permis;
private $lieu_delivrance;
private $date_delivrance;
private $nb_jour;
private $date_depart;
private $heure_depart;
private $date_retour;
private $heure_retour;
private $marque_vehicule;
private $type_client;
private $etat_vehicule;
private $assurance;
private $n_serie;
private $isDone;

//Execute  database connection
public function __construct(){

  //Execute  database connection
  $this->db = new Database();
  //Failed reservation (devis)
  $this->reservationFailed();
  //Delete reservation (date validite passed)
  $this->reservationDelOnPassedDateVal();



}


//Failed reservation in devis
public function reservationFailed()
{
  //Query
  $query =" UPDATE devis SET reservation_status = 'Failed',isDone='not done' WHERE date_validite < CURRENT_DATE AND isDone = 'not done'";

  //Execute
  $FailedDevis = $this->db->query($query);
}

public function ReservationSuccess($id)
{
  //Query
  $query = "UPDATE reservation SET isDone = 'done' WHERE id = $id";
  $execute = $this->db->query($query);
}




//Data collector function
public function reservation_data_collect($data){



  $this->nom = $data['nom'];
  $this->prenom = $data['prenom'];
  $this->adress = $data['adress'];
  $this->email = $data['email'];
  $this->date_naissance = $data['date_naissance'];
  $this->telephone = $data['telephone'];
  $this->cin = $data['cin'];
  $this->pays = $data['pays'];
  $this->ville = $data['ville'];
  $this->code_postal = $data['code_postal'];
  $this->n_permis = $data['n_permis'];
  $this->lieu_delivrance = $data['lieu_delivrance'];
  $this->date_delivrance = $data['date_delivrance'];
  $this->nb_jour = $data['nb_jour'];
  $this->date_depart = $data['date_depart'];
  $this->heure_depart = $data['heure_depart'];
  $this->date_retour = $data['date_retour'];
  $this->heure_retour = $data['heure_retour'];
  $this->marque_vehicule = $data['marque_vehicule'];
  $this->etat_vehicule = $data['etat_vehicule'];
  $this->assurance = $data['assurance'];
  $this->n_serie = $data['n_serie'];
  $this->type_client = $data['type_client'];


}






//Insert new reservation
public function insert_reservation($data){
  //Data collector
  $this->reservation_data_collect($data);

  //Check if cin exists in database
  $query = "SELECT * FROM clients WHERE cin = ?";
  $fetch_client = $this->db->select($query,[$this->cin]);
  if(!$fetch_client){
    //Query
    $query = "INSERT INTO  clients(nom,prenom,email,date_naissance,telephone,cin,
                                   adress,ville,pays,n_permis,code_postal,type_client)
                                   VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

    //Insert new client
    $new_client = $this->db->insert($query,[$this->nom,$this->prenom,$this->email,$this->date_naissance,$this->telephone,$this->cin,$this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal,$this->type_client]);
    //Query
    $query = "INSERT INTO  reservation(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,n_permis,code_postal,lieu_delivrance,date_delivrance,nb_jour,date_depart,
                                        heure_depart,date_retour,heure_retour,marque_vehicule,
                                        etat_vehicule,assurance,n_serie)
                                         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    //Insert new reservation


    $insert_reservation = $this->db->insert($query,[
      $this->nom,$this->prenom,$this->email,$this->date_naissance,$this->telephone,$this->cin,
      $this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal,$this->lieu_delivrance,
      $this->date_delivrance,$this->nb_jour,$this->date_depart,$this->heure_depart,$this->date_retour,$this->heure_retour,
      $this->marque_vehicule,$this->etat_vehicule,$this->assurance,$this->n_serie
    ]);


    $reservation_id = $this->db->link->lastInsertId();

    $appendArry = [
      "reservation_id" => $reservation_id
    ];

    $dataFinal = array_merge($data,$appendArry);
    //Error handling
    if($insert_reservation->rowCount() > 0){
      return   header("Location:../Devis/insert_devis.php?data=".urlencode(serialize($dataFinal))."");
    }else {
      return insert_error_message();
    }


  }else{
    //Query
    $query = "INSERT INTO  reservation(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,n_permis,code_postal,lieu_delivrance,date_delivrance,nb_jour,date_depart,
                                        heure_depart,date_retour,heure_retour,marque_vehicule,
                                        etat_vehicule,assurance,n_serie)
                                         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    //Insert new reservation
    $insert_reservation = $this->db->insert($query,[
      $this->nom,$this->prenom,$this->email,$this->date_naissance,$this->telephone,$this->cin,
      $this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal,$this->lieu_delivrance,
      $this->date_delivrance,$this->nb_jour,$this->date_depart,$this->heure_depart,$this->date_retour,$this->heure_retour,
      $this->marque_vehicule,$this->etat_vehicule,$this->assurance,$this->n_serie
    ]);

    $reservation_id = $this->db->link->lastInsertId();

    $appendArry = [
      "reservation_id" => $reservation_id
    ];

    $dataFinal = array_merge($data,$appendArry);
    //Error handling
    if($insert_reservation->rowCount() > 0){
      return   header("Location:../Devis/insert_devis.php?data=".urlencode(serialize($dataFinal))."");

    }else {
      return insert_error_message();
    }
}

}



//Update reservation
public function update_reservation($id,$data){
  //Data collector
  $this->reservation_data_collect($data);

  //Query
  $query = "UPDATE reservation SET nom =?,
                                   prenom=?,
                                   email=?,
                                   date_naissance=?,
                                   telephone=?,
                                   cin=?,
                                   adress=?,
                                   ville=?,
                                   pays=?,
                                   n_permis=?,
                                   code_postal=?,
                                   lieu_delivrance=?,
                                   date_delivrance=?,
                                   nb_jour=?,
                                   date_depart=?,
                                   heure_depart=?,
                                   date_retour=?,
                                   heure_retour=?,
                                   marque_vehicule=?,
                                   etat_vehicule=?,
                                   assurance=?,
                                   n_serie = ?
                                   WHERE id = ?
                                    ";


  //Update reservation
  $reservation_update = $this->db->update($query,[
    $this->nom,$this->prenom,$this->email,$this->date_naissance,$this->telephone,$this->cin,
    $this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal,$this->lieu_delivrance,
    $this->date_delivrance,$this->nb_jour,$this->date_depart,$this->heure_depart,$this->date_retour,$this->heure_retour,
    $this->marque_vehicule,$this->etat_vehicule,$this->assurance,$this->n_serie,$id  ]);

  //Error handling
  if($reservation_update){
    return header("Location:../Devis/devis_edit.php?reservation_id=$id");
  }else{
    return update_error_message();
  }
}





//Delete reservatioin
public function delete_reservation($id){

  //Query
  $query = "DELETE  FROM reservation WHERE id = ?";

  //Delete reservation
  $reservation_delete = $this->db->delete($query,[$id]);

  //Error handling
  if($reservation_delete){
    return delete_success_message();
  }else{
    return delete_error_message();
  }


}



//Fetch reservation by id
public function fetch_reservation($id){

  //Query
  $query = "SELECT * FROM reservation WHERE id = ?";

  $fetch_reservation = $this->db->select($query,[$id]);

  if($fetch_reservation){
    return $fetch_reservation->fetch();
  }else{
    return error_message("cette reservation n'existe pas");
  }
}



//Fetch all reservation
public function fetch_allReservation(){

  //Query
  $query = "SELECT * FROM reservation";
  $fetch_allReservation = $this->db->query($query);

  if($fetch_allReservation){
    return $fetch_allReservation->fetchAll();
  }else{
    return error_message("il n'y a pas des reservations pour le moment!");
  }
}


}
