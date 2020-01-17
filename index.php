<?php
include 'config.php';
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

/*var_dump($freitag = new Notice(4, 4, '2020-01.05', 'heute ziehe ich mit den beiden Monstern zu Sascha und bleibe bis ende märz'));
$freitag->save();*/

var_dump(Department::getAllAsArray());



