<?php
namespace App;

//use Monolog\Handler\StreamHandler;
//use Monolog\Logger;
// lo movemos a monolog y lo traemos aquí
use App\helper\Monolog;

use App\ViewManager;

use DI\ContainerBuilder;

use App\controllers\IndexController;

use App\routing\Web;

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
      $ViewManager = new ViewManager();
    }

    public function init()
    {

      // monolog
      $this->logger->info('Kernel up');
      //echo "<h1>Arrancado kernel</h1>";

      // $indexController = new IndexController($this->container);
      // $indexController->index();

      // dejamos de inyectamos manualmente, sino con la librería nikic
      // que nos extraiga lo que recibe para pasarselo al routingManager
      $httpMethod = $_SERVER['REQUEST_METHOD'];
      $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
      $route = $this->container->get(RoutingManager::class);
      $route->dispatch($httpMethod, $uri, Web::getDispatcher());


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

    public static function getProjectDir():string
    {
      return dirname(__DIR__);
    } 
  }