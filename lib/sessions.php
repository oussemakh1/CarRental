<?php

class Sessions
{

  public static function init()
  {
    return session_start();
  }



  public static function set($SessionName,$SessionVal)
  {
    if(session_start() == true)
    {
      return $_SESSION[$SessionName] = $SessionVal;
    }else{
        session_start();
        return $_SESSION[$SessionName] = $SessionVal;
    }
  }


  public  static function get($SessionName)
  {
      return $_SESSION[$SessionName];
  }



  public static function logout()
  {
    if(session_start()==true)
    {
      return session_destroy();
    }else{
      return false;
    }
  }

  public static function CheckAdminLogin()
  {

    if(isset($_SESSION['adminLogin']) == true)
    {
      return true;
    }else{
      return false;
    }
  }

}
