<?php

//Include user modal
include '../../Modals/User.php';


class UserController
{

  private $db;
  private $User;


  public function __construct()
  {
    $this->db = new Database();
    $this->User = new User();
  }

  public function getUserByname($nom)
  {
    return $this->User->getUserByname($nom);
  }

  //Users
  public function Users()
  {
      return $this->User->users();
  }

  //Insert user
  public function Userinsert($data)
  {
    return $this->User->insert_user($data);
  }

  //Edit user
  public function UserEdit($id)
  {
    return $this->User->edit_user($id);
  }

  //Update user
  public function Userupdate($id,$data)
  {
    return $this->User->update_user($id,$data);
  }

  //Delete user
  public function UserDelete($id)
  {
    return $this->User->delete_user($id);
  }


}
