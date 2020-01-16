<?php


class Db
{
    private static $pdo;

    public static function connect()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PWD);
            } catch
            (Exception $e) {

                file . file_put_contents('error.log', var_export($e, true) . "\n" . file_get_contents('error.log'));

                throw new Exception('DB ist down');
                echo 'DB hat keine Verbindung';
            }
        }

        return self::$pdo;
    }

}