<?php
require_once "init.php";

if (isset($_SERVER["PATH_INFO"])){
    $request = $_SERVER["PATH_INFO"];
}else {
    $request = $_SERVER["REQUEST_URI"];
}

$router = $container->build("router");

if ($request == "/masterclass/"){
    $router->add("indexController", "home");
}
elseif ($request == "/Users") {
    $router->add("userController", "allUsers");
}
elseif ($request == "/Users=user"){
    $router->add("userController", "userprofile");
}
elseif ($request == "/Register"){
    $router->add("registerController", "register");
}
else {
    $router->add("errorController", "errorPage");
}

