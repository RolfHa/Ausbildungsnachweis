<?php
include 'config.php';
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

Department::getAll();



