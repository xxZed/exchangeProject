<?php

require_once(SYSTEM . 'exception/SystemException.class.php');

class RequestHandler
{
    public function __construct($className)
    {
        $className = $className . 'Page';
        $classPath = SYSTEM . $className . '.class.php';
        
        if (!preg_match('/^[a-z0-9_]+$/i', $className) || !file_exists($classPath)) {
            throw new Exception();
        }

        var_dump($className);
        var_dump($classPath);
        require($classPath);

        if (!class_exists($className)) {
            throw new SystemException("Class '" . $className . "' does not exists");
        } else {
            new $className();
        }
    }

    public static function handle()
    {
        if (!empty($_POST['page']) || empty($_GET['page'])) {
            new RequestHandler((!empty($_GET['page'])) ? $_GET['page'] : $_POST['page']);
        } else {
            new RequestHandler('Index');
        }
    }
}
