<?php
namespace a\public\index;

require_once __DIR__ . '/../../vendor/autoload.php';

use Exception;
use a\app\http;
use a\connections\Router;

$route = new Router();
try{

    //Estrutura basica de uma rota de uma api
    $route->add("get", "/user", [http\deleteController::class, "list"]);
    //Estrutura basica de uma rota, de uma pagina web basica
    $route->add("GET", "/user", function(){
        return '';
    });
    //Estrutura basica de um grupo de rotas.
    $router->group('/api', function(Router $router){
        $router->add("get", "/user", [http\deleteController::class, "list"]);
    });

    }catch(Exception $e){
        echo $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>     
</head>
<body>
    <div class="container">
        <h2>A result the worked this framework</h2>
        <div class="dashboard">
            <table>
                <tr hx-get="/user" hx-target=".dashboard" hx-swap="innerHTML">
                    <td>User List is</td>

                </tr>
            </table>
        </div>
    </div>
</body>
</html>
