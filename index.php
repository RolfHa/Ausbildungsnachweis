<?php

$weekdays = ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'];
$departments  = ['Modul 1', 'Modul 2', 'Modul 3'];
$data = [
    [
        'description' => 'Description Mo',
        'hours' => "8\n10",
        'totalHours' => '18',
        'department' => 1
    ],[
        'description' => 'Description Di',
        'hours' => '5',
        'totalHours' => '5',
        'department' => 2
    ],[
        'description' => 'Description Mi',
        'hours' => '5',
        'totalHours' => '5',
        'department' => 3
    ],[
        'description' => 'Description Do',
        'hours' => '5',
        'totalHours' => '5',
        'department' => 1
    ],[
        'description' => 'Description Fr',
        'hours' => '5',
        'totalHours' => '5',
        'department' => 1
    ],[
        'description' => 'Description Sa',
        'hours' => '',
        'totalHours' => '',
        'department' => 1
    ],[
        'description' => 'Description So',
        'hours' => '',
        'totalHours' => '',
        'department' => 1
    ]
];

include "view/header.php";
include "view/sheet.php";
include "view/footer.php";