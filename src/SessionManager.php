<?php
namespace App;

class SessionManager
{

  // crear sesión
  public static function put($variable, $value) 
  {
    $_SESSION[$variable] = serialize($value);
  }

  // recuperar el elemento guardado en la sesión
  public static function get($variable) 
  {
    return unserialize($_SESSION[$variable]);
  }






}