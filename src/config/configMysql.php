<?php
namespace App\config;

class configMysql
{
  public static function getConfigDB()
  {
    return[
      'database'=> [
        'name'=>'bootcampfullstack',
        'username'=>'root',
        'password'=>'mysql',
        'connection'=>'mysql:host=127.0.0.1'
        //'options'=>''
        ]
      ];
  }
}