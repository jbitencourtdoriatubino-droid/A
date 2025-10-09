<?php
namespace api\app;
//Aquirvo com a arquitetura de validação de token
header("content-type aplication/json");

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use securite\tokens\Token;

$header = getallheaders();

if(!isset($header["Autorizetion"])){
    http_response_code(401);
    echo (json_encode(["error" => "Não autorizado"]));
    exit;
}
else if (!empty($header["Autorizetion"])) {
    $token = explode(" ", $header["Autorizetion"])[1];
} else {
    http_response_code(401);
    echo (json_encode(["error" => "Não autorizado"]));
    exit;
}   

try{

    if(!empty(JWT::decode($token, new key($key, 'HS256')))){
        http_response_code(401);
    }else{
        http_response_code(200);
    }

} catch (Exception $e){
    http_response_code(404);
    echo("fatal error". $e->getMessage());
}