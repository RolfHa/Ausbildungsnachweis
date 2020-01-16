<?php


class Db
{
    private static $pdo;

    public static function connect()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PWD);
            } catch (Exception $e) {
                $file = __DIR__ . "/../var/error.log";
                file_put_contents($file, var_export($e, true) . "\n" . file_get_contents($file));
                die('DB hat keine Verbindung');
            }
        }

        return self::$pdo;
    }

}