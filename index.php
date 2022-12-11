<?php
session_start();

require_once "init.php";

//session_destroy();

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
# UserDashboard
elseif ($request == "/Dashboard"){
    $router->add("userDashboardController", "userDashboardMain");
}
#Login
elseif ($request == "/Login") {
    $router->add("loginController", "login");
}
# Logout
elseif ($request == "/Logout") {
    $router->add("logoutController", "logout");
}
else {
    $router->add("errorController", "errorPage");
}

