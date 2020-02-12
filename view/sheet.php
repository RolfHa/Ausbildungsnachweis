<?php
require_once __DIR__ . "/../class/FrontendUtils.php";

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'update') {
    Week::saveWeek($_REQUEST['data']);
}

$currentEducationYear = FrontendUtils::getUserEducationStartDate();

// Navigation Paging
$dateOfWeek = false;
if(isset($_GET['date'])) {
    $dateOfWeek = strtotime($_GET['date']);
}

if(isset($_POST['currentWeekDate'])) {
    $dateOfWeek = strtotime($_POST['currentWeekDate']);
}

if($dateOfWeek === false) {
    $dateOfWeek = time();
}
$currentWeekTs = strtotime("monday this week", $dateOfWeek);
$currentWeek = date('Y-m-d', $currentWeekTs);
$previousWeek = date('Y-m-d', strtotime("last monday", $currentWeekTs));
$nextWeek = date('Y-m-d', strtotime("next monday", $currentWeekTs));

$moduleList = Modul::getAll();
$data = Week::getWeek($currentWeek, FrontendUtils::getUserId());

include "view/sheet.html.php";