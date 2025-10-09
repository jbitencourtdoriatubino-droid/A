<?php
namespace a\app\http;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../connections/pdo.php';

use Exception;

class deleteController {

    private array $request;
    private \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function delete($id){
        //Implementa a exclusão de dados por meio de uma query em pdo
    }
}