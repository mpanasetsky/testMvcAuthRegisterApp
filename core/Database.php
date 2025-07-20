<?php

class Database {
    private static $pdo;

    public static function getInstance() {
        if (!self::$pdo) {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
            self::$pdo = new PDO($dsn, DB_USER, DB_PASS);
        }
        return self::$pdo;
    }
}
