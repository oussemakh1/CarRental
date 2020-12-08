<?php

 //Include database
 include_once '../../lib/Database.php';
 //Include messages
 include_once  '../../func/messages.php';
 //include validations
 include_once '../../func/Validations.php';




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


    //Insert new reservation
      $query = "SELECT n_serie FROM reservation WHERE n_serie = ? AND  status ='Succed' AND date_retour < current_date()";
      $Check = $this->db->select($query,[$this->n_serie]);
      if($Check) {
          header("Location:../Vehicules/Vehiules.php?error_message=Cette vehicule deja en reservation!");
      } else {

          //Query
          $query = "INSERT INTO  reservation(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,n_permis,code_postal,lieu_delivrance,date_delivrance,nb_jour,date_depart,
                                        heure_depart,date_retour,heure_retour,marque_vehicule,
                                        etat_vehicule,assurance,n_serie)
                                         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          //Insert new reservation


          $insert_reservation = $this->db->insert($query, [
              $this->nom, $this->prenom, $this->email, $this->date_naissance, $this->telephone, $this->cin,
              $this->adress, $this->ville, $this->pays, $this->n_permis, $this->code_postal, $this->lieu_delivrance,
              $this->date_delivrance, $this->nb_jour, $this->date_depart, $this->heure_depart, $this->date_retour, $this->heure_retour,
              $this->marque_vehicule, $this->etat_vehicule, $this->assurance, $this->n_serie
          ]);


          $reservation_id = $this->db->link->lastInsertId();

          $appendArry = [
              "reservation_id" => $reservation_id
          ];

          $dataFinal = array_merge($data, $appendArry);
          //Error handling
          if ($insert_reservation->rowCount() > 0) {
              return header("Location:../Devis/insert_devis.php?data=" . urlencode(serialize($dataFinal)) . "");
          } else {
              return header("Location:../Vehicules/Vehicules.php?insert_error");
          }

      }
  }else {

      //Insert new reservation
      $query = "SELECT n_serie FROM reservation WHERE n_serie = ? AND  status ='Succed' AND date_retour < current_date()";
      $Check = $this->db->select($query,[$this->n_serie]);
      if ($Check) {
          header("Location:../Vehicules/Vehiules.php?error_message=Cette vehicule deja en reservation!");
      } else {
          //Query
          $query = "INSERT INTO  reservation(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,n_permis,code_postal,lieu_delivrance,date_delivrance,nb_jour,date_depart,
                                        heure_depart,date_retour,heure_retour,marque_vehicule,
                                        etat_vehicule,assurance,n_serie)
                                         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          //Insert new reservation
          $insert_reservation = $this->db->insert($query, [
              $this->nom, $this->prenom, $this->email, $this->date_naissance, $this->telephone, $this->cin,
              $this->adress, $this->ville, $this->pays, $this->n_permis, $this->code_postal, $this->lieu_delivrance,
              $this->date_delivrance, $this->nb_jour, $this->date_depart, $this->heure_depart, $this->date_retour, $this->heure_retour,
              $this->marque_vehicule, $this->etat_vehicule, $this->assurance, $this->n_serie
          ]);

          $reservation_id = $this->db->link->lastInsertId();

          $appendArry = [
              "reservation_id" => $reservation_id
          ];

          $dataFinal = array_merge($data, $appendArry);
          //Error handling
          if ($insert_reservation->rowCount() > 0) {
              return header("Location:../Devis/insert_devis.php?data=" . urlencode(serialize($dataFinal)) . "");

          } else {
              return header("Location:../Vehicules/Vehicules.php?insert_error");
          }
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
      return header("Location:../Vehicules/Vehicules.php?update_error");
  }
}





//Delete reservatioin
public function delete_reservation($id){

  //Query delete reservation
  $queryR = "DELETE  FROM reservation WHERE id = ?";

  //Query delete devis
  $queryD = "DELETE FROM devis WHERE reservation_id = ?";

  //Delete reservation
  $reservation_delete = $this->db->delete($queryR,[$id]);
  //Delete devis
  $devis_delete = $this->db->delete($queryD,[$id]);

  //Error handling
  if($reservation_delete && $devis_delete){
      return header("Location:../Vehicules/Vehicules.php?delete_success");
  }else{
      return header("Location:../Vehicules/Vehicules.php?delete_error");
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
      return header("Location:../Vehicules/Vehicules.php?error_message=Cette vehicule n'exist pas");
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
      return header("Location:../Vehicules/Vehicules.php?error_message=Il n'y pas des reservation pour le moment");
  }
}


}
