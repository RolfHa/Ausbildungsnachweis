<?php
ini_set('xdebug.var_display_max_depth', '10');
require_once __DIR__ . "/../class/FrontendUtils.php";

$departmentList = [
    [
        'id' => 1,
        'name' => 'Modul 1'
    ],[
        'id' => 2,
        'name' => 'Modul 2'
    ],[
        'id' => 3,
        'name' => 'Modul 3'
    ],[
        'id' => 4,
        'name' => 'Modul 4'
    ],[
        'id' => 5,
        'name' => 'Modul 5'
    ]
];


$data = [
    'document' => [
        'user' => [
            'id' => 1,
            'firstname' => 'John ',
            'lastname' => 'Doe'
        ],
        'number' => 20,
        'start' => '2020-10-12',
        'year' => 2020,
        'notice' => 'Some Note'
    ],
    'sheet' => [
        [
            'description' => 'Description Mo',
            'hours' => "8\n10",
            'total_hours' => '18',
            'department' => 1
        ], [
            'description' => 'Description Di',
            'hours' => '5',
            'total_hours' => '5',
            'department' => 2
        ], [
            'description' => 'Description Mi',
            'hours' => '5',
            'total_hours' => '5',
            'department' => 3
        ], [
            'description' => 'Description Do',
            'hours' => '5',
            'total_hours' => '5',
            'department' => 1
        ], [
            'description' => 'Description Fr',
            'hours' => '5',
            'total_hours' => '5',
            'department' => 1
        ], [
            'description' => 'Description Sa',
            'hours' => '',
            'total_hours' => '',
            'department' => 1
        ], [
            'description' => 'Description So',
            'hours' => '',
            'total_hours' => '',
            'department' => 1
        ]
    ]
];


if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'update') {

    var_dump($_REQUEST);
    $data = $_REQUEST['data'];
}

include "view/sheet.html.php";