<?php

//Includ reparation class
include '../../Modals/Reparation.php';



class ReparationController
{
  private $db;
  private $Reparation;



  public function __construct()
  {
    $this->db = new Database();
    //Inherit reparation class
    $this->Reparation = new Reparation();
  }


  //Insert Reparation
  public function reparation_insert($data)
  {
      return $this->Reparation->insert_reparation($data);
  }


  //Edit Reparation
  public function reparation_edit($id)
  {
    return $this->Reparation->fetch_reparation($id);
  }


  //Update Reparation
  public function reparation_update($id,$data)
  {
    return $this->Reparation->update_reparation($id,$data);
  }

  //Delete Repearation
  public function  reparation_delete($id)
  {
    return $this->Reparation->delete_reparation($id);
  }

  //Fetch Mecanicien
  public function Mecaniciens()
  {
    return $this->Reparation->fetch_allMecanicien();
  }

}
