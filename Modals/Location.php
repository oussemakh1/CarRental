<?php

  //include database
  include_once '../../lib/Database.php';
  //inlucde messages
  include_once  '../../func/messages.php';
  //include validation
  include_once '../../func/Validations.php';
  //Math funtions
  include_once '../../func/MathFunc.php';
  //DateDif
  include_once '../../func/DateFunc.php';
  //Facture
  include_once '../../Modals/Facture.php';
  //Clients
  include_once  '../../Modals/Clients.php';

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
  private $remise;
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
public function __construct()
{
  $this->db = new Database();
}

//Insert new Location
public function insert_Location($data){

  $this->Location_data_collect($data);

  // check if clients already in database
  $clientExists = $this->ifClientExist();

  if($clientExists == false)
  {
      $client = new Clients();
      $client_data = [
              "nom" => $this->nom,
              "prenom" =>$this->prenom,
              "email" =>$this->email,
              "date_naissance" =>$this->date_naissance,
              "telephone" => $this->telephone,
              "cin" => $this->cin,
              "adress" => $this->adress,
              "ville" => $this->ville,
              "pays" => $this->pays,
              "n_permis" => $this->n_permis,
              "code_postal" => $this->code_postal,
              "type_client" =>$this->type_client
           ];

      $client->insert_client($client_data);
  }

  // check if car taken
  $isCarTaken= $this->ifCarTaken();

  // insert new renting
  if($isCarTaken == false)
  {
        $query = "INSERT INTO  
                              location(
                                        nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,
                                        n_permis,code_postal,date_delivrance,lieu_delivrance,type_client,
                                        marque_vehicule,etat_vehicule,assurance,caution,mode_paiement,nb_jour,
                                        date_depart,heure_depart,date_retour,heure_retour,prix_ht,tva,prix_ttc,paye_le,
                                        deja_regle_acompte,date_acompte,lieu_retour,remise,n_serie
                                        )
                               VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
                ;

        $insert_location = $this->db->insert(
            $query,
            [
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

            ]
        );

        // generate invoice
        $fact = new Facture();
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
            "tva" =>   $getTva,
            "remise" =>   $getDiscount,
            "total" =>   $this->prix_ttc,
            "date_fact" =>  date('Y-m-d'),
            "date_reglement" =>   $this->paye_le,
            "date_acompte" =>   $this->date_acompte,
            "mode_reglement" =>   $this->mode_paiement,
            "mode_livraison" =>   $this->lieu_delivrance,
            "location_id" => $locationId,
            "cin" => $this->cin,

        ];


        $insertFact = $fact->insert_facture($facture_data);


        if($insert_location->rowCount() > 0){
            return header("Location:../Facture/facture.php?location_id=$locationId");
        } else {
            return insert_error_message();
        }


    }
  else {
          return error_message('Vehicule en cours');
  }


}


//Update location
public function update_location($id,$data){

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
  $location_update = $this->db->update(
      $query,
      [
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
            $this->n_serie,
            $id
      ]
  );

  // update facture
  if($location_update){


      $facture_data = [
          "nom_client"=>$this->nom,
          "prenom_client"=>  $this->prenom,
          "telephone_client"=>$this->telephone,
          "code_postal_client" =>$this->code_postal,
          "nom_adress_fact" =>$this->adress,
          "nb_jour" =>$this->nb_jour,
          "prix" =>     $this->prix_ht,
          "tva" =>   $getTva,
          "remise" =>   $getDiscount,
          "total" =>   $this->prix_ttc,
          "date_fact" =>  date('Y-m-d'),
          "date_reglement" =>   $this->paye_le,
          "date_acompte" =>   $this->date_acompte,
          "mode_reglement" =>   $this->mode_paiement,
          "mode_livraison" =>   $this->lieu_delivrance,
          "cin" => $this->cin

      ];

      $fact = new Facture();
      $fact->update_facture($id,$facture_data);
      return header("Location:../Facture/facture.php?location_id=$id");
      
  }
  else{
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
  if(!$location_delete OR !$facture_delete){
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




//Data collector function
    private function Location_data_collect($data){


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


//Check if client exists
    private function ifClientExist()
    {
        //check database if cin exists
        $query = "SELECT * FROM clients WHERE cin = ?";
        $fetch_client = $this->db->select($query,[$this->cin]);

        if($fetch_client)
        {
            return true;
        } else {
            return  false;
        }
    }


//Check if car en cours
    private function ifCarTaken()
    {
        $query = "SELECT n_serie FROM location WHERE n_serie = ? AND date_retour > CURRENT_DATE() ";
        $fetch_car_Location = $this->db->select($query,[$this->n_serie]);

        if($fetch_car_Location)
        {
            return true;
        } else {
            return false;
        }
    }



}


?>
