<?php

namespace api\app\model;

use ReflectionClass;
use api\app\http;
use ReflectionMethod;

abstract class model {

    private array $methods =  [];
    protected string $table;

    public function getTable(): string {

        $enty = new ReflectionClass(static::class);
        $entity = $enty->getShortName();
        $this->table = strtolower($entity) . 's';

        return $this->table;
    }


    public function getmethodo(){

        $dir = dirname(__DIR__ . '/../http');
        $files = scandir($dir);
        
        foreach($files as $file){
            return array_filter($files, fn($file) => str_ends_with($file, '.php'));

            if (str_ends_with($file, '.php')){
                require_once $dir .'/'.$file;
            }
        }

        if (empty($files)) {
            return [];
        }foreach($files as $f){
            require_once $dir .'/'.$f;
        }
        $method = $this->methods[] = [$f];

        return $method;
    }

    public function getMethods(): array {

        $metodo = $this->getmethodo();
        $methods = [];
        foreach ($metodo as $className) {
            if (class_exists($className)) {
                $reflection = new ReflectionClass($className);
                foreach ($reflection->getMethods() as $method) {
                    $methods[] = $method->getName();
                }
            }
        }

        return $methods;
    }


}