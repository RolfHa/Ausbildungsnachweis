<?php


class FrontendUtils
{
    private static $days = ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'];

    static function getGermanDayName($i) {
        return self::$days[$i];
    }
}