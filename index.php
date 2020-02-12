<?php
include 'config.php';
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';

});

session_start();

if(isset($_SESSION) && isset($_SESSION['auth']) && $_SESSION['auth'] === true){
    $view = "view/sheet.php";
} else {
    include "view/login.php";
    $view = "view/login.html.php";
}

include "view/header.php";
include $view;
include "view/footer.php";

