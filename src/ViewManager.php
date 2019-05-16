<?php
namespace App;

use App\interfaces\LoggerInterface;

use Twig;

class ViewManager
{
  protected $twig;
  private $logger;

  // FIX NO FUNCIONA DE MOMENTO EL LOGGER
  //public function __construct(LoggerInterface $logger) 
  public function __construct() 
  {
    // $this->logger = $logger;
    // $this->logger->info("view manager");

   $loader = new \Twig\Loader\FilesystemLoader(Kernel::getProjectDir().'/templates');
   $this->twig = new \Twig\Environment($loader);

  }

  public function render($view, $args=[])
  {
    if($args != null) {
      extract($args, EXTR_SKIP);
    }
    $file = Kernel::getProjectDir()."/templates/".$view;

    if(is_readable($file)){
      require $file;
    } else {
      throw new \InvalidArgumentException();
    }
  }

  public function renderTemplate($template, $args=[])
  {
    static $twig = null;
    if($twig === null){
      $loader = new \Twig_Loader_Filesystem(kernel::getProjectDir().'/templates');
      $twig = new \Twig_Environment($loader);
    }
    echo $twig->render($template, $args);
  }




}