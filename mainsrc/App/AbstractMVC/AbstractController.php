<?php
namespace App\App\AbstractMVC;

class AbstractController {
    public function pageLoad($dir, $view, $variablen) {
        extract($variablen);
        require_once __DIR__ . "/../../" . $dir . "/MVC/Views/" . $view . ".php";
    }
}
