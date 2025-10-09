<?php 

namespace a\connections;

use a\connections\src\env;

require_once __DIR__ . '/../vendor/autoload.php';

$localhost = env::get('DB_LOCALHOST');
$dbname = env::get('DB_NAME');
$user = env::get('DB_USER');
$password = env::get('DB_PASSWORD');
$PDO = [
    'host' => $localhost,
    'dbname' => $dbname,
    'user' => $user,
    'password' => $password,
];
class connection{

    private static array  $pdo = $PDO;

    public function connect(){
        try{
            if($stmt = new \PDO("mysql:host={$this->pdo['host']};dbname={$this->pdo['dbname']}", $this->pdo['user'], $this->pdo['password'],[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION])){
                var_dump(json_encode(["connected" => $stmt]));
            }else{
                http_response_code(500);
            }
        }catch(\PDOException $e){
            var_dump(json_encode(["error" => $e->getMessage()]));
            http_response_code(500);
        }
    }
}
?>