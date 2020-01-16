<?php
include 'config.php';
session_start();
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

$view = "view/login.php";
if(isset($_SESSION) && isset($_SESSION['auth']) && $_SESSION['auth'] === true){
    $view = "view/sheet.php";
}

include "view/header.php";
include $view;
include "view/footer.php";