<?php


class FrontendUtils
{
    private static $days = ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'];

    static function getGermanDayName($i) {
        return self::$days[$i];
    }

    static function getUserId() {
        return $_SESSION['user']['id'];
    }

    static function getUserFirstname() {
        return $_SESSION['user']['firstname'];
    }

    static function getUserLastname() {
        return $_SESSION['user']['lastname'];
    }

    static function getUserFullName() {
        return self::getUserFirstname() . ' ' . self::getUserLastname();
    }

    /**
     * @return false|string
     */
    static function getUserEducationStartDate() {
        return date("d.m.Y", strtotime($_SESSION['user']['education_start']));

    }
}