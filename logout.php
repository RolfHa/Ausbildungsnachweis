<?php
session_start();
if(isset($_SESSION) && isset($_SESSION['auth']) && $_SESSION['auth'] === true){
    $_SESSION['auth'] = false;
}
session_destroy();
header("location:index.php");
exit();