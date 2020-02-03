<?php
$error = '';
if(isset($_REQUEST) && isset($_REQUEST['action']) && $_REQUEST['action'] == 'login'){

    $userInput = trim($_REQUEST['user']);
    $passInput = trim($_REQUEST['pass']);
    $userObj = User::getByFirstName($userInput);

    if($userObj instanceof User && $userObj->getPassWord() === md5($passInput)) {

        $_SESSION['auth'] = true;
        $_SESSION['user'] = $userObj;
        header("location:index.php");
    } else {
        $error = 'Benutzer oder Passwort falsch!';
    }
}