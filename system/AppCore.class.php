<?php
define('SYSTEM', '/xampp/htdocs/exchangeProject/system/');

require(SYSTEM . 'core.functions.php');
require(SYSTEM . 'util/RequestHandler.class.php');
require_once(SYSTEM . 'exception/SystemException.class.php');

/**
 * 
 * AppCore klasa koja sadrzi glavne funkcije za projekt
 * 
 * 
 * 
 * @author Zdeslav Nazlic, Marin Marincic
 */

class AppCore
{
    protected static $dbObj;

    /**
     * funkcija konstrukt koja poziva inicijalizaciju baze, loada options.inc i zove funkciju handle() iz RequestHandler.class.php 
     * 
     */
    public function __construct()
    {
        $this->initDB();
        $this->initOptions();
        RequestHandler::handle();
    }

    /**
     * InitOptions loada sve iz options.inc.php
     * 
     */
    public function initOptions()
    {
        require(SYSTEM . 'options.inc.php');
    }

    /**
     * handleException kao parametar ima objekt oblika Exception koji se prosljeduje funkciji showErrors u core.functions.php
     * 
     * @param Exception
     * 
     */
    public static function handleException($e)
    {
        try{
            showErrors($e);
        } catch (Exception $err){
            showErrors($err);
        }
    }

    /**
     * initDB() inicijalizira protected $dbObj s parametirma iz config.inc.php, te pomocu konstruktora iz MySQLiDatabase.class.php connecta se na bazu
     */
    public function initDB()
    {
        require(SYSTEM . 'config.inc.php');
        require(SYSTEM . 'model/MySQLiDatabase.class.php');

        self::$dbObj = new MySQLiDatabase(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    }

    /**
     * getDB() vraca $dbObj 
     * 
     * @return Object
     * 
     */
    public static final function getDB()
    {
        return self::$dbObj;
    }

    /**
     * autoload() loada file imena $className.php iz util foldera, ako postoji s require_once ce se pozvati unutar AppCore-a, ako ne 
     * postoji printat ce error message
     * 
     * @param string
     * 
     */
    public static function autoload($className)
    {
        file_exists($className)
            ? require_once '.system/util/' . $className . '.php'
            : print_r('Class name not found');
    }
}
