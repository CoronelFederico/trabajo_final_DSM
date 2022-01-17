<?php
session_start();
ob_start();
ob_end_flush();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';





function showError(){
    $error =new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])){
    $nombreControlador = $_GET['controller'] . 'Controller';
}elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombreControlador = controllerDefault;
}
else {
    // echo '<h1>el controlador no existe</1>';
    showError();
    exit();
}



if (class_exists($nombreControlador)) {
    $controlador = new $nombreControlador;

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $actiondef = actionDefault;
        $controlador -> $actiondef();
    }
    
    else
        // echo 'la accion no existe';
        showError();
} else{
    showError();
    $error->index();
}

require_once 'views/layout/footer.php';