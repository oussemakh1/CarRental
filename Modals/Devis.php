<?Php


//Include database
include_once '../../lib/Database.php';
//Include messages
require '../../lib/messages.php';




class Devis{

  private $db;
  private $nom_client;
  private $prenom_client;
  private $adress_client;
  private $telephone;
  private $codepostal_client;
  private $reference_devis;
  private $designation_devis;
  private $nb_jour;
  private $prix;
  private $remise;
  private $total;
  private $date_devis;
  private $date_validite;


  //Execute database connection
  public function __construct(){
    $this->db = new Database();

  }

  //Data collector function
  public function devis_data_collector($data){

    $this->nom_client = $data['nom_client'];
    $this->prenom_client = $data['prenom_client'];
    $this->adress_client = $data['adress_client'];
    $this->codepostal_client = $data['codepostal_client'];
    $this->reference_devis = $data['reference_devis'];
    $this->designation_devis = $data['designation_devis'];
    $this->nb_jour = $data['nb_jour'];
    $this->prix = $data['prix'];
    $this->remise = $data['remise'];
    $this->total = $data['total'];
    $this->date_devis = $data['date_devis'];
    $this->date_validite =  $data['date_validite'];


    /** Filtring data



    **/


  }

//Insert new devis
public function insert_devis($data){
  //Data collector
  $this->devis_data_collector($data);

  //Query
  $query = "INSERT INTO  devis(nom_client,prenom_client,adress_client,codepostal_client,
                               reference_devis,designation_devis,nb_jour,prix,remise,total,date_devis,date_validite)
                               VALUES(?,?,?,?,?,?,?,?,?,?,?,?)
                               ";

  //Insert devis
  $new_devis = $this->db->insert($query,[
    $this->nom_client,
    $this->prenom_client,
    $this->adress_client,
    $this->codepostal_client,
    $this->reference_devis,
    $this->designation_devis,
    $this->nb_jour,
    $this->prix,
    $this->remise,
    $this->total,
    $this->date_devis,
    $this->date_validite
   ]);

  //Error handling
  if($new_devis->rowCount() > 0){
    return insert_success_message();
  }else{

    return insert_error_message();
  }

}

//Update devis
public function update_devis($id,$data){
  //Data collector
  $this->devis_data_collector($data);

  //Query
  $query = "UPDATE devis SET nom_client = ?,
                             prenom_client = ?,
                             adress_client = ?,
                             codepostal_client=?,
                             reference_devis=?,
                             designation_devis=?,
                             nb_jour=?,
                             prix=?,
                             remise=?,
                             total=?,
                             date_devis=?,
                             date_validite=?
                             WHERE id = ?
                             ";
  //Update devis
  $devis_update = $this->db->update($query,[
    $this->nom_client,
    $this->prenom_client,
    $this->adress_client,
    $this->codepostal_client,
    $this->reference_devis,
    $this->designation_devis,
    $this->nb_jour,
    $this->prix,
    $this->remise,
    $this->total,
    $this->date_devis,
    $this->date_validite,
    $id
  ]);

  //Error handling
  if($devis_update){
    return update_success_message();
  }else{
    return update_error_message();
  }
}


//Delete devis
public function delete_devis($id){
  //Query
  $query = "DELETE  FROM devis WHERE id = ?";

  //Delete devis
  $devis_delete = $this->db->delete($query,[$id]);

  //Error handling
  if($devis_delete){
    return delete_success_message();
  }else{
    return delete_error_message();
  }
}



//Get devis
public function fetch_devis($id){

  //query
  $query = "SELECT * FROM devis WHERE id = ?";

  $fetch_devis = $this->db->select($query,[$id]);

  if($fetch_devis){
    return $fetch_devis->fetch();
  }else{
      return error_message("cette devis n'existe pas");
  }
}

//Get All devis
public function fetch_allDevis(){

  //Query
  $query = "SELECT * FROM  devis ";

  $fetch_allDevis = $this->db->query($query);

  if($fetch_allDevis){
    return $fetch_allDevis->fetchAll();
  }else{
    return error_message("il n'y a pas des devis pour le moment!");
  }

}

}
