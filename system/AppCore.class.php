<?php


define('SYSTEM', '/xampp/htdocs/exchangeProject/system/');

require(SYSTEM . 'core.functions.php');
require(SYSTEM . 'util/RequestHandler.class.php');
require_once(SYSTEM . 'exception/SystemException.class.php');

class AppCore
{
    protected static $dbObj;

    public function __construct()
    {
        $this->initDB();
        $this->initOptions();
        RequestHandler::handle();
    }

    public function initOptions()
    {
        require(SYSTEM . 'options.inc.php');
    }

    public static function handleExceptio($e)
    {
        echo ("
            Error: " . $e->getMessage() .
            "File: " . $e->getFile() .
            "Line: " . $e->getLine() .
            "StackTrace: "  . $e->getTraceAsString()
        );
    }

    public function initDB()
    {
        require(SYSTEM . 'config.inc.php');
        require(SYSTEM . 'model/MySQLiDatabase.class.php');

        self::$dbObj = new MySQLiDatabase(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    }

    public static final function getDB()
    {
        return self::$dbObj;
    }

    public static function autoload($className)
    {
        file_exists($className)
            ? require_once '.system/util/' . $className . '.php'
            : print_r('Class name not found');
    }
}
