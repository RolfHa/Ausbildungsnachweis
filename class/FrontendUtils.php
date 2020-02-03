<?php

/**
 * Class FrontendUtils
 */
class FrontendUtils
{
    /**
     * @var array
     */
    private static $days = ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'];

    /**
     * @param $i
     * @return mixed
     */
    static function getGermanDayName($i)
    {
        return self::$days[$i];
    }

    /**
     * @return User|null
     */
    static function getUserObjFromSession()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] instanceof User) {
            return $_SESSION['user'];
        }
        return null;
    }

    /**
     * @return string
     */
    static function getUserFullName()
    {
        /** @var User $u */
        $u = self::getUserObjFromSession();
        if ($u instanceof User) {
            return $u->getFirstName() . ' ' . $u->getLastName();
        }
        return '';
    }

    /**
     * @return int|mixed
     */
    static function getUserId()
    {
        /** @var User $u */
        $u = self::getUserObjFromSession();
        if ($u instanceof User) {
            return $u->getId();
        }
        return -1;
    }

    /**
     * @return false|string
     */
    static function getUserEducationStartDate()
    {
        /** @var User $u */
        $u = self::getUserObjFromSession();
        if ($u instanceof User) {
            return date("d.m.Y", strtotime($u->getEducationStartDate()));
        }

        return '';
    }
}