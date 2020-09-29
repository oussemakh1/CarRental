<?php

 //Include databse
 include_once '../../lib/Database.php';
 //Include messages
 include '../../lib/messages.php';


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
private $immatriculation_vehicule;
private $proprietaire;
private $etat_vehicule;
private $assurance;

//Execute  database connection
public function __construct(){
  $this->db = new Database();
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
  $this->immatriculation_vehicule = $data['immatriculation_vehicule'];
  $this->proprietaire = $data['proprietaire'];
  $this->etat_vehicule = $data['etat_vehicule'];
  $this->assurance = $data['assurance'];

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
                                   adress,ville,pays,n_permis,code_postal)
                                   VALUES(?,?,?,?,?,?,?,?,?,?,?)";

    //Insert new client
    $new_client = $this->db->insert($query,[$this->nom,$this->prenom,$this->email,$this->date_naissance,$this->telephone,$this->cin,$this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal]);
    //Query
    $query = "INSERT INTO  reservation(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,n_permis,code_postal,lieu_delivrance,date_delivrance,nb_jour,date_depart,
                                        heure_depart,date_retour,heure_retour,marque_vehicule,immatriculation_vehicule,proprietaire,
                                        etat_vehicule,assurance)
                                         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    //Insert new reservation
    $insert_reservation = $this->db->insert($query,[
      $this->nom,$this->prenom,$this->email,$this->date_naissance,$this->telephone,$this->cin,
      $this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal,$this->lieu_delivrance,
      $this->date_delivrance,$this->nb_jour,$this->date_depart,$this->heure_depart,$this->date_retour,$this->heure_retour,
      $this->marque_vehicule,$this->immatriculation_vehicule,$this->proprietaire,$this->etat_vehicule,$this->assurance
    ]);

    //Error handling
    if($insert_reservation->rowCount() > 0){
      return insert_success_message();
    }else {
      return insert_error_message();
    }


  }else{
    //Query
    $query = "INSERT INTO  reservation(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,n_permis,code_postal,lieu_delivrance,date_delivrance,nb_jour,date_depart,
                                        heure_depart,date_retour,heure_retour,marque_vehicule,immatriculation_vehicule,proprietaire,
                                        etat_vehicule,assurance)
                                         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    //Insert new reservation
    $insert_reservation = $this->db->insert($query,[
      $this->nom,$this->prenom,$this->email,$this->date_naissance,$this->telephone,$this->cin,
      $this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal,$this->lieu_delivrance,
      $this->date_delivrance,$this->nb_jour,$this->date_depart,$this->heure_depart,$this->date_retour,$this->heure_retour,
      $this->marque_vehicule,$this->immatriculation_vehicule,$this->proprietaire,$this->etat_vehicule,$this->assurance
    ]);

    //Error handling
    if($insert_reservation->rowCount() > 0){
      return insert_success_message();
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
                                   immatriculation_vehicule=?,
                                   proprietaire=?,
                                   etat_vehicule=?,
                                   assurance=?
                                   WHERE id = ?
                                    ";


  //Update reservation
  $reservation_update = $this->db->update($query,[
    $this->nom,$this->prenom,$this->email,$this->date_naissance,$this->telephone,$this->cin,
    $this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal,$this->lieu_delivrance,
    $this->date_delivrance,$this->nb_jour,$this->date_depart,$this->heure_depart,$this->date_retour,$this->heure_retour,
    $this->marque_vehicule,$this->immatriculation_vehicule,$this->proprietaire,$this->etat_vehicule,$this->assurance,$id  ]);

  //Error handling
  if($reservation_update->rowCount() > 0){
    return update_success_message();
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
