<?php
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
    ],[
        'id' => 0,
        'name' => '*ABWESEND*'
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

//$data = Department::getAllAsArray();

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'update') {
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
    $data = $_REQUEST['data'];
}



// Navigation Paging

$dateOfWeek = false;
if(isset($_GET['date'])) {
    $dateOfWeek = strtotime($_GET['date']);
}

if($dateOfWeek === false) {
    $dateOfWeek = time();
}
$currentWeekTs = strtotime("monday this week", $dateOfWeek);
$currentWeek = date('Y-m-d', $currentWeekTs);
$previousWeek = date('Y-m-d', strtotime("last monday", $currentWeekTs));
$nextWeek = date('Y-m-d', strtotime("next monday", $currentWeekTs));

include "view/sheet.html.php";