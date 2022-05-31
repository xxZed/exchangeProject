<?php

require_once(SYSTEM . 'exception/SystemException.class.php');


/**
 * classa RequestHandler sadrzi dvi funkcije za obradivanje GET requesta u URL
 */
class RequestHandler
{
    /**
     * __construct u slucaj da stranica postoji provjerava se je li postoji klasa istog imena, ako postoji klasa se poziva i izvrsava
     * ako ne postoji izbacuje SystemException error
     * 
     * @param string
     * 
     */
    public function __construct($className)
    {
        $className = $className . 'Page';
        $classPath = SYSTEM . 'control/' . $className . '.class.php';

        if (!preg_match('/^[a-z0-9_]+$/i', $className) || !file_exists($classPath)) {
            throw new Exception();
        }

        require($classPath);

        if (!class_exists($className)) {
            throw new SystemException("Class '" . $className . "' does not exists");
        } else {
            new $className();
        }
    }

    /**
     * handle() pomocu GET uzima page koji zovemo te konstruktoru proslijedi ime page-a koji zovemo
     * u slucaj da page ne postoji vraca se na defaultnu stranicu Index
     */
    public static function handle()
    {
        if (!empty($_POST['page']) || !empty($_GET['page'])) {
            new RequestHandler((!empty($_GET['page'])) ? $_GET['page'] : $_POST['page']);
        } else {
            new RequestHandler('Index');
        }
    }
}
