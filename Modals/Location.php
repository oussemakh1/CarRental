<?php

  //include database
  include_once '../../lib/Database.php';
  //inlucde messages
  include_once  '../../func/messages.php';
  //include validation
  include_once '../../func/Validations.php';
  //Math funtions
  include '../../func/MathFunc.php';
  //DateDif
  include_once '../../func/DateFunc.php';

class Location{

private $db;

  private $nom;
  private $prenom;
  private $date_naissance;
  private $adress;
  private $code_postal;
  private $ville;
  private $pays;
  private $telephone;
  private $email;
  private $n_permis;
  private $date_delivrance;
  private $lieu_delivrance;
  private $cin;
  private $type_client;
  private $marque_vehicule;
  private $immatriculation_vehicule;
  private $proprietaire;
  private $etat_vehicule;
  private $assurance;
  private $caution;
  private $mode_paiement;
  private $nb_jour;
  private $date_depart;
  private $heure_depart;
  private $date_retour;
  private $heure_retour;
  private $prix_ht;
  private $tva;
  private $prix_ttc;
  private $paye_le;
  private $deja_regle_acompte;
  private $date_acompte;
  private $lieu_retour;
  private $n_serie;

//Execute databse connection
public function __construct(){
  $this->db = new Database();
}


//Data collector function
public function Location_data_collect($data){


  $this->nom = $data['nom'];
  $this->prenom = $data['prenom'];
  $this->date_naissance = $data['date_naissance'];
  $this->adress = $data['adress'];
  $this->code_postal = $data['code_postal'];
  $this->ville = $data['ville'];
  $this->pays = $data['pays'];
  $this->telephone = $data['telephone'];
  $this->email = $data['email'];
  $this->n_permis = $data['n_permis'];
  $this->date_delivrance = $data['date_delivrance'];
  $this->lieu_delivrance =  $data['lieu_delivrance'];
  $this->cin = $data['cin'];
  $this->type_client = $data['type_client'];
  $this->marque_vehicule = $data['marque_vehicule'];
  $this->etat_vehicule = $data['etat_vehicule'];
  $this->assurance = $data['assurance'];
  $this->caution = $data['caution'];
  $this->mode_paiement = $data['mode_paiement'];
  $this->nb_jour = $data['nb_jour'];
  $this->date_depart = $data['date_depart'];
  $this->heure_depart = $data['heure_depart'];
  $this->date_retour = $data['date_retour'];
  $this->heure_retour = $data['heure_retour'];
  $this->prix_ht = $data['prix_ht'];
  $this->tva = $data['tva'];
  $this->paye_le = $data['paye_le'];
  $this->deja_regle_acompte = $data['deja_regle_acompte'];
  $this->date_acompte = $data['date_acompte'];
  $this->lieu_retour = $data['lieu_retour'];
  $this->remise = $data['remise'];
  $this->n_serie = $data['n_serie'];
  $this->prix_ttc = getTotal($_POST['remise'],$_POST['prix_ht'],$_POST['tva']);




}



//Insert new Location
public function insert_Location($data){

  $this->Location_data_collect($data);
  //check database if cin exists
  $query = "SELECT * FROM clients WHERE cin = ?";
  $fetch_client = $this->db->select($query,[$this->cin]);
  if(!$fetch_client){
    //Query
    $query = "INSERT INTO  clients (nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,n_permis,code_postal,type_client)
              VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";




    //Insert new client
    $new_client = $this->db->insert($query,[$this->nom,$this->prenom,$this->email,$this->date_naissance,
                                            $this->telephone,$this->cin,$this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal,$this->type_client]);


                                            //Check if car exists in location
                                            $query = "SELECT n_serie FROM location WHERE n_serie = ? AND date_retour > CURRENT_DATE() ";

                                            $fetch_car_Location = $this->db->select($query,[$this->n_serie]);
                                            if(!$fetch_car_Location){
                                              //Insert new Location
                                              $query = "INSERT INTO  location(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,
                                                                               n_permis,code_postal,date_delivrance,lieu_delivrance,type_client,
                                                                               marque_vehicule,etat_vehicule,
                                                                               assurance,caution,mode_paiement,nb_jour,date_depart,heure_depart,
                                                                               date_retour,heure_retour,prix_ht,tva,prix_ttc,paye_le,
                                                                               deja_regle_acompte,date_acompte,lieu_retour,remise,n_serie)
                                                        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                              $insert_location = $this->db->insert($query,[

                                                  $this->nom,
                                                  $this->prenom,
                                                  $this->email,
                                                  $this->date_naissance,
                                                  $this->telephone,
                                                  $this->cin,
                                                  $this->adress,
                                                  $this->ville,
                                                  $this->pays,
                                                  $this->n_permis,
                                                  $this->code_postal,
                                                  $this->date_delivrance,
                                                  $this->lieu_delivrance,
                                                  $this->type_client,
                                                  $this->marque_vehicule,
                                                  $this->etat_vehicule,
                                                  $this->assurance,
                                                  $this->caution,
                                                  $this->mode_paiement,
                                                  $this->nb_jour,
                                                  $this->date_depart,
                                                  $this->heure_depart,
                                                  $this->date_retour,
                                                  $this->heure_retour,
                                                  $this->prix_ht,
                                                  $this->tva,
                                                  $this->prix_ttc,
                                                  $this->paye_le,
                                                  $this->deja_regle_acompte,
                                                  $this->date_acompte,
                                                  $this->lieu_retour,
                                                  $this->remise,
                                                  $this->n_serie

                                                  ]);


                                                        //Handel facture
                                                        $locationId = $this->db->link->lastInsertId();

                                                            $getTva = getTva($this->remise,$this->prix_ht,$this->tva);
                                                            $getDiscount = getDiscount($this->remise,$this->prix_ht);

                                                            $facture_data = [
                                                              "nom_client"=>$this->nom,
                                                              "prenom_client"=>  $this->prenom,
                                                              "telephone_client"=>$this->telephone,
                                                              "code_postal_client" =>$this->code_postal,
                                                              "nom_adress_fact" =>$this->adress,
                                                              "nb_jour" =>$this->nb_jour,
                                                              "prix" =>     $this->prix_ht,
                                                              "tvaPercentage"=> $this->tva,
                                                              "tva" =>   $getTva,
                                                              "remisePercentage" => $this->remise,
                                                              "remise" =>   $getDiscount,
                                                              "total" =>   $this->prix_ttc,
                                                              "date_fact" =>  date('Y-m-d'),
                                                              "date_reglement" =>   $this->paye_le,
                                                              "date_acompte" =>   $this->date_acompte,
                                                              "mode_reglement" =>   $this->mode_paiement,
                                                              "mode_livraison" =>   $this->lieu_delivrance,
                                                              "cin" => $this->cin,
                                                              "marque_vehicule" => $this->marque_vehicule,
                                                              "date_depart" => $this->date_depart,
                                                              "date_retour" => $this->date_retour
                                                            ];



                                                        $appendArray = [
                                                          "location_id" => $locationId
                                                        ];



                                                          $dataFinal = array_merge($facture_data,$appendArray);

                                                      //End Handel facture

                                              //Error handeling
                                              if($insert_location){
                                                return     header("Location:../Facture/facture.php?data=".urlencode(serialize($dataFinal))."");                                              }else{
                                              }
                                            }else{
                                              return error_message('client in location');
                                            }




  }else{

    //Check if car exists in location
    $query = "SELECT n_serie FROM location WHERE n_serie =? AND date_retour > CURRENT_DATE()";

    $fetch_car_Location = $this->db->select($query,[$this->n_serie]);
    if(!$fetch_car_Location){
      //Insert new Location
      $query = "INSERT INTO  location(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,
                                       n_permis,code_postal,date_delivrance,lieu_delivrance,type_client,
                                       marque_vehicule,etat_vehicule,
                                       assurance,caution,mode_paiement,nb_jour,date_depart,heure_depart,
                                       date_retour,heure_retour,prix_ht,tva,prix_ttc,paye_le,
                                       deja_regle_acompte,date_acompte,lieu_retour,remise,n_serie)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $insert_location = $this->db->insert($query,[

          $this->nom,
          $this->prenom,
          $this->email,
          $this->date_naissance,
          $this->telephone,
          $this->cin,
          $this->adress,
          $this->ville,
          $this->pays,
          $this->n_permis,
          $this->code_postal,
          $this->date_delivrance,
          $this->lieu_delivrance,
          $this->type_client,
          $this->marque_vehicule,
          $this->etat_vehicule,
          $this->assurance,
          $this->caution,
          $this->mode_paiement,
          $this->nb_jour,
          $this->date_depart,
          $this->heure_depart,
          $this->date_retour,
          $this->heure_retour,
          $this->prix_ht,
          $this->tva,
          $this->prix_ttc,
          $this->paye_le,
          $this->deja_regle_acompte,
          $this->date_acompte,
          $this->lieu_retour,
          $this->remise,
          $this->n_serie
      ]);

        $locationId = $this->db->link->lastInsertId();

      //Handel facture

          $getTva = getTva($this->remise,$this->prix_ht,$this->tva);
          $getDiscount = getDiscount($this->remise,$this->prix_ht);

          $facture_data = [
            "nom_client"=>$this->nom,
            "prenom_client"=>  $this->prenom,
            "telephone_client"=>$this->telephone,
            "code_postal_client" =>$this->code_postal,
            "nom_adress_fact" =>$this->adress,
            "nb_jour" =>$this->nb_jour,
            "prix" =>     $this->prix_ht,
            "tvaPercentage"=> $this->tva,
            "tva" =>   $getTva,
            "remisePercentage" => $this->remise,
            "remise" =>   $getDiscount,
            "total" =>   $this->prix_ttc,
            "date_fact" =>  date('Y-m-d'),
            "date_reglement" =>   $this->paye_le,
            "date_acompte" =>   $this->date_acompte,
            "mode_reglement" =>   $this->mode_paiement,
            "mode_livraison" =>   $this->lieu_delivrance,
            "cin" => $this->cin,
            "marque_vehicule" => $this->marque_vehicule,
            "date_depart" => $this->date_depart,
            "date_retour" => $this->date_retour
          ];



      $appendArray = [
        "location_id" => $locationId
      ];



        $dataFinal = array_merge($facture_data,$appendArray);

    //End Handel facture

      //Error handeling
      if($insert_location){
        return  header("Location:../Facture/facture.php?data=".urlencode(serialize($dataFinal))."");
      }else{
        return insert_error_message();
      }
    }else{
      return error_message('vehicule in location');
    }



  }
}




//Update location
public function update_location($id,$data){
  //Data collector
  $this->Location_data_collect($data);


  $getTva = getTva($this->remise,$this->prix_ht,$this->tva);
  $getDiscount = getDiscount($this->remise,$this->prix_ht);

  //Query
  $query = "UPDATE  location SET nom=?,
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
                                 date_delivrance=?,
                                 lieu_delivrance=?,
                                 type_client=?,
                                 marque_vehicule=?,
                                 immatriculation_vehicule=?,
                                 etat_vehicule=?,
                                 assurance=?,
                                 caution=?,
                                 mode_paiement=?,
                                 nb_jour=?,
                                 date_depart=?,
                                 heure_depart=?,
                                 date_retour=?,
                                 heure_retour=?,
                                 prix_ht=?,
                                 tva=?,
                                 prix_ttc=?,
                                 paye_le=?,
                                 deja_regle_acompte=?,
                                 date_acompte=?,
                                 lieu_retour=?,
                                 remise = ?,
                                 n_serie = ?
                                 WHERE id =?
                                 ";

  //Update Location
  $location_update = $this->db->update($query,[
    $this->nom,
    $this->prenom,
    $this->email,
    $this->date_naissance,
    $this->telephone,
    $this->cin,
    $this->adress,
    $this->ville,
    $this->pays,
    $this->n_permis,
    $this->code_postal,
    $this->date_delivrance,
    $this->lieu_delivrance,
    $this->type_client,
    $this->marque_vehicule,
    $this->immatriculation_vehicule,
    $this->etat_vehicule,
    $this->assurance,
    $this->caution,
    $this->mode_paiement,
    $this->nb_jour,
    $this->date_depart,
    $this->heure_depart,
    $this->date_retour,
    $this->heure_retour,
    $this->prix_ht,
    $this->tva,
    $this->prix_ttc,
    $this->paye_le,
    $this->deja_regle_acompte,
    $this->date_acompte,
    $this->lieu_retour,
    $this->remise,
    $this->n_serie,
    $id
  ]);


  $facture_data_update = [
    "nom_client"=>$this->nom,
    "prenom_client"=>  $this->prenom,
    "telephone_client"=>$this->telephone,
    "code_postal_client" =>$this->code_postal,
    "nom_adress_fact" =>$this->adress,
    "nb_jour" =>$this->nb_jour,
    "prix" =>     $this->prix_ht,
    "tvaPercentage"=> $this->tva,
    "tva" =>   $getTva,
    "remisePercentage" => $this->remise,
    "remise" =>   $getDiscount,
    "total" =>   $this->prix_ttc,
    "date_fact" =>date('Y-m-d'),
    "date_reglement" =>   $this->paye_le,
    "date_acompte" =>   $this->date_acompte,
    "mode_reglement" =>   $this->mode_paiement,
    "mode_livraison" =>   $this->lieu_delivrance,
    "cin" => $this->cin,
    "marque_vehicule" => $this->marque_vehicule,
    "date_depart" => $this->date_depart,
    "date_retour" => $this->date_retour
  ];

  //Error handling
  if($location_update){



      $query =  "UPDATE facture SET nom_client =?,
                                                  prenom_client =?,
                                                  telephone_client = ?,
                                                  code_postal_client = ?,
                                                  nom_adress_fact = ?,
                                                  nb_jour = ?,
                                                  prix = ?,
                                                  tva =?,
                                                  remise = ?,
                                                  total = ?,
                                                  date_fact = ?,
                                                  mode_reglement = ?,
                                                  mode_livraison = ?
                                                  cin = ?
                                                  WHERE location_id  = ?";

      $today = date('Y-m-d');
      $update_facture = $this->db->update($query,[

      $this->nom,
        $this->prenom,
      $this->telephone,
        $this->code_postal,
        $this->adress,
        $this->nb_jour,
      $this->prix_ht,
        $this->tva,
        $this->remise,
      $this->prix_ttc,
          $today,
        $this->mode_paiement,
      $this->lieu_delivrance,
       $this->cin,
        $id
      ]);


      return header("Location:../Facture/facture.php?data_update=".urlencode(serialize($facture_data_update))."");


  }else{
    return update_error_message();
  }
}




//Delete Location
public function delete_location($id){
  // delete location
  $queryR = "DELETE  FROM location WHERE id  = ?";
  // delete facture
  $queryD = "DELETE FROM facture WHERE location_id = ?";

  //Delete Location
  $location_delete = $this->db->delete($queryR,[$id]);

  //Delete Facture
  $facture_delete = $this->db->delete($queryD,[$id]);

  //Error handling
  if($location_delete && $facture_delete){
    return $this->db->query("DELETE FROM facture WHERE location_id = $id");
  }else{
    return delete_error_message();
  }



}


//Fetch Location by id
public function fetch_location($id){

  //Query
  $query = "SELECT * FROM location WHERE id = ?";

  $fetch_location = $this->db->select($query,[$id]);

  if($fetch_location){
    return $fetch_location->fetch();
  }else{
    return error_message("cette location n'existe pas");
  }
}

//Fetch all Location
public function fetch_allLocation(){

  //Query
  $query = "SELECT * FROM location";

  $fetch_allLocation = $this->db->query($query);

  if($fetch_allLocation){
    return $fetch_allLocation->fetchAll();
  }else{
    return error_message("il n'y a pas des locations pour le moment!");
  }
}

}


?>
