<?php
session_start();
$view = "view/login.php";
if(isset($_SESSION) && isset($_SESSION['auth']) && $_SESSION['auth'] === true){
    $view = "view/sheet.php";
}

include "view/header.php";
include $view;
include "view/footer.php";