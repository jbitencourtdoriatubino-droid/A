<?php
namespace a\connections\src;

use a\connections\src;

class env {

    public static function get($key){
        if (!empty($_ENV[$key])){
            for ($i = 0; $i < count($_ENV[$key]); $i++){
                return var_dump(json_encode([$_ENV[$key][$i]]));
            }
        }
        return $_ENV[$key] ?? null;
        exit;
    }
}