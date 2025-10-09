<?php
namespace a\securite;

require_once __DIR__ . '\vendor\autoload.php';

session_start();
if(isset($_REQUEST['REQUEST_METHOD']) == 'POST'){
    $nome =$_POST['nome'];
    $email =$_POST['email'];
    $senha =$_POST['senha'];

    if(!$nome || !$email || !$senha){

        header('location: api/index.php');

        $_SESSION['tnome'] = $nome;
        $_SESSION['temail'] = $email;
        $_SESSION['tsenha'] = $senha;

    }else{

        http_response_code(400);
        header('location: api/templete/index.html');

    }

}else{

    http_response_code(404);
    
}
?>