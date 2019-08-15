<?php

namespace app\service;

class Service{

    public function __construct($container){
        $this->container = $container; // Se obtiene el container
    }

    public function __get($property){
        if ($this->container->{$property}){
            return $this->container->{$property};
        }
    }

    public function getObject($params){
        return (object)$params;
    }
}

?>
