<?php 

namespace a\app\entity;

abstract class Entity {
    protected array $a = [];

    public function _set($propites, $value){
        $this->a[$propites] = $value;
    }

    public function _get($propites){
        return $this->a[$propites] ?? null;
    }
}
?>