<?php
 //Facture
 include '../../Modals/Facture.php';

class FactureController
{

private $db;

public function __construct()
{
  $this->db = new Database();
}

//Get company info
public function CompanyInfo()
{
  //Query
  $query = "SELECT * FROM company_info";

  //Fetch
  $fetch = $this->db->query($query);
  if($fetch){
    return $fetch->fetch();
  }
}


//Factures
public function factures()
{
  $facture = new Facture();
  return $facture->fetch_AllFacture();
}


//Facture
public function getFacture($id)
{
    $facture = new Facture();

    return $facture->fetch_facture($id);
}


//Insert facture
public function insert_facture($data)
{
  $facture = new Facture();

   return $facture->insert_facture($data);
}


//Edit Facture
public function edit_facture($id,$data)
{
  $facture = new Facture();

  return $facture->update_facture($data);
}

//Delete Facture
public function delete_facture($id)
{
  $facture = new Facture();

  return $facture->delete_facture($id);
}



//Change facture status failed
public function ChangeStatFailed($date_fact)
{
    $facture = new Facture();
    return $facture->ChangeStatFailed($date_fact);
}

}
