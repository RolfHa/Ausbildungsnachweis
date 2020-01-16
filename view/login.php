<?php
$error = '';
if(isset($_REQUEST) && isset($_REQUEST['action']) && $_REQUEST['action'] == 'login'){

    // check credentials
    if($_REQUEST['user'] == 'john' && $_REQUEST['pass'] == 'doe') {
        $_SESSION['auth'] = true;
        header("location:_index.php");
    } else {
        $error = 'Benutzer oder Passwort falsch!';
    }
}

include "view/login.html.php";