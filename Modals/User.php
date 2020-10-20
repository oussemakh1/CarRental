<?php

include '../../lib/Database.php';


class User
{

  private $db;
  private $username;
  private $user_pass;
  private $user_privileges;


  public function __construct()
  {
    $this->db = new Database();
  }





  //User data validation
  private function userDataValidation($data)
  {
    $this->username = $data['username'];
    $this->user_pass = $data['user_pass'];
    $this->user_privileges = $data['user_privileges'];

    /**Validation**/


  }


  public function getUserByname($nom)
  {
    //Query
    $query = "SELECT * FROM users WHERE username = '$nom'";
    $execute = $this->db->query($query);
    if($execute){
      return $execute->fetch();
    }
  }

  //Users
  public function users()
  {
    //Query
    $query = "SELECT * FROM users ORDER BY id DESC";

    //Fetch
    $users = $this->db->query($query);

    if($users)
    {
        return $users->fetchAll();
    }else{

    }
  }


  //Insert user
  public function insert_user($data)
  {

        //data validation
        $this->userDataValidation($data);

        //Check if username exists
          $query = "SELECT username FROM users WHERE username = ?";
          $fetch = $this->db->select($query,[$this->username]);
          if($fetch){
            return 'error';
          }else{
            //Query
            $query = "INSERT INTO users(username,user_pass,user_privileges) VALUES(?,?,?)";

            //Insert
            $new_user = $this->db->insert($query,[
                $this->username,$this->user_pass,$this->user_privileges
            ]);

            if($new_user){

            }else{

            }
          }

  }



  //Edit user
  public function edit_user($id)
  {

      //Query
      $query = "SELECT * FROM users WHERE id = ?";

      //Fetch
      $user = $this->db->select($query,[$id]);

      if($user){
        return $user->fetch();
      }else{

      }
  }


  //Update user
  public function update_user($id,$data)
  {
    //Data validation
    $this->userDataValidation($data);

    //Query
    $query = "UPDATE users SET username=?,user_pass=?,user_privileges=? WHERE id =?";

    //Update
    $update_user = $this->db->update($query,[
        $this->username,$this->user_pass,$this->priviliges,$id
    ]);
  }


  //Delete user
  public function delete_user($id)
  {
    //Query
    $query = "DELETE FROM users WHERE id = ?";

    //Delete
    $delete_user = $this->db->delete($query,[$id]);

    if($delete_user)
    {

    }else{

    }
  }




}
