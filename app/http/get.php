<?php
namespace a\app\http;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../connections/pdo.php';

use Exception;
use a\connections\connection;

class listController {

    private array $request;


    public function list(){
        // Implementa a listagem de dados por meio de uma query em pdo
        $pdo = new connection();
        $conn = $pdo->connect();
        $c = var_dump("listando dados");
        return $c;
    }
}