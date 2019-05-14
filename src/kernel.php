<?php
namespace App;

//use Monolog\Handler\StreamHandler;
//use Monolog\Logger;
// lo movemos a monolog y lo traemos aquí
use App\helper\Monolog;

use DI\ContainerBuilder;

//use Kint;

  class kernel
  {

    public $logger; // Monolog

    public function __construct(){
      // // monolog -> lo movemos a Monolog
      // $this->logger = new Logger('Kernel');
      // $this->logger->pushHandler(new StreamHandler(dirname(__DIR__).'/var/log/prod.log'), Logger:: DEBUG);

      // almacenamos contenedor
      $this->logger = new Monolog();

      // create container builder with php-di
      $this->container = $this->createContainer();
      // 
      $this->container->set(LoggerInterface::class, $this->logger);
      //Kint::dump($this->container);
    }

    public function init()
    {

      // monolog
      $this->logger->info('Kernel up');
      echo "<h1>Arrancado kernel</h1>";
    }

    // librería PHP-DI
    // create container builder
    public function createContainer()
    {
      // creamos la instancia
      $containerBuilder = new ContainerBuilder();
      // definimos la instancia, 
      // por el nombre de la variable va a ser capaz de inyectarme el objeto de esa variable automáticamente
      // autowiring true
      $containerBuilder->useAutowiring(true);
      // Create container
      return $containerBuilder->build();
    }
  }