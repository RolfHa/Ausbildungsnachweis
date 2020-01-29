<?php
$error = '';
if(isset($_REQUEST) && isset($_REQUEST['action']) && $_REQUEST['action'] == 'login'){

    // check credentials
    if($_REQUEST['user'] == 'john' && $_REQUEST['pass'] == 'doe') {
        $_SESSION['auth'] = true;
        $_SESSION['user'] = [
            'id' => 1,
            'firstname' => 'John',
            'lastname' => 'Doe',
            'education_start' => '2019-03-01'
        ];
        header("location:index.php");
    } else {
        $error = 'Benutzer oder Passwort falsch!';
    }
}