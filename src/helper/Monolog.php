<?php
namespace App\helper;

use App\interfaces\LoggerInterface;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Monolog implements LoggerInterface
{
  private $logger;

  // inyectamos por composición la dependencia
  public function __construct()
  {
      // // monolog
      $this->logger = new Logger('Kernel');
      $this->logger->pushHandler(new StreamHandler(dirname(__DIR__).'/var/log/prod.log'), Logger:: DEBUG);
    
      $this->logger = $logger;

  }

  public function getLogger():LoggerInterface
  {
    return $this->logger;

  }

  public function info(string $message)
  {
    $this->logger->info($message);
  }
  public function warning(string $message)
  {
    $this->logger->warning($message);
  }
  public function error(string $message)
  {
    $this->logger->error($message);
  }

}