<?php
namespace a\securite\Token;
header('Content-Type: application/json');
session_start();

// Caminho correto até vendor/autoload.php
require_once __DIR__ . '\vendor\autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Confirma que a sessão tem email
if (!isset($_SESSION['temail'])) {
    http_response_code(401);
    echo json_encode(["error" => "Usuário não autenticado."]);
    exit;
}

$email = $_SESSION['temail'];

$key = 'ihIgibIGIy8756O$%6t%R&4%$46536fjBJ,hiY*T';

$payload = [
    "iat" => time(),
    "email" => $email,
    "exp" => time() + 300
];

$token = JWT::encode($payload, $key, 'HS256');