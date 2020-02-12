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
    static function getUserFirstName()
    {
        /** @var User $u */
        $u = self::getUserObjFromSession();
        if ($u instanceof User) {
            return $u->getFirstName();
        }
        return '';
    }

    /**
     * @return string
     */
    static function getUserLastName()
    {
        /** @var User $u */
        $u = self::getUserObjFromSession();
        if ($u instanceof User) {
            return $u->getLastName();
        }
        return '';
    }

    /**
     * @return string
     */
    static function getUserFullName()
    {
        return self::getUserFirstName() . ' ' . self::getUserLastName();
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

    /**
     * @param string $currentWeek
     * @return false|string
     */
    static function getUserEducationYear($currentWeek)
    {
        /** @var User $u */
        $u = self::getUserObjFromSession();
        if ($u instanceof User) {
            $current = date_create($currentWeek);
            $start = date_create($u->getEducationStartDate());
            $interval = $current->diff($start);

            return ceil(intval($interval->format('%a')) / 365);
        }

        return '';
    }

    /**
     * @param string $currentWeek
     * @return false|float|int
     */
    static function getUserSheetNumber($currentWeek)
    {
        /** @var User $u */
        $u = self::getUserObjFromSession();
        if ($u instanceof User) {
            $current = date_create($currentWeek);
            $start = date_create($u->getEducationStartDate());
            $interval = $current->diff($start);

            return floor(intval($interval->format('%a')) / 7) + 1;
        }

        return -1;
    }

    /**
     * @param string $currentWeek
     * @return false|string
     */
    static function getWeekStartDate($currentWeek)
    {
        return date('d.m.Y', strtotime($currentWeek));
    }

    /**
     * @param string $currentWeek
     * @return false|string
     */
    static function getWeekEndDate($currentWeek)
    {
        return date('d.m.Y', strtotime($currentWeek . ' +6 days'));
    }
}