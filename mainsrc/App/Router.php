<?php

namespace App\App;

class Router{

    public function __construct(Container $container){
        $this->container = $container;
    }

    public function add($ctrl, $function){
        $controller = $this->container->build($ctrl);
        $view = $function;
        $this->build($controller, $view);
    }

    public function build($controller, $view){
        $controller->$view();
    }

}