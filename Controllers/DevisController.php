<?php

//Devis
include '../../Modals/Devis.php';



class DevisController
{


  //Devis
  public function Devis(){
    $devis = new Devis();
    return $devis->fetch_allDevis();
  }


  //Insert Devis
  public function insert_devis($data){

    $devis = new Devis();
    return $devis->insert_devis($data);

  }

  //Edit Devis
  public function edit_devis($reservation_id){
    $devis = new Devis();
    return $devis->fetch_devis($reservation_id);
  }

  //Update devis
  public function update_devis($id,$data){
    $devis = new Devis();
    return $devis->update_devis($id,$data);
  }

  //Delete Devis
  public function delete_devis($id){
    $devis = new Devis();
    return $devis->delete_devis($id);
  }



}

?>
