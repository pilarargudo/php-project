<?php
namespace App;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

  class kernel
  {

    public $logger; // Monolog

    public function __construct(){
      // monolog
      $this->logger = new Logger('Kernel');
      $this->logger->pushHandler(new StreamHandler(dirname(__DIR__).'/var/log/prod.log'), Logger:: DEBUG);

    }

    public function init()
    {

      // monolog
      $this->logger->info('Kernel up');      
      echo "<h1>Arrancado kernel</h1>";
    }
  }