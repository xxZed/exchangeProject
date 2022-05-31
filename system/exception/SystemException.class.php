<?php


class SystemException extends Exception
{
    /**
     * poziva Exception __construct te prosljeduje sljedece parametre
     * 
     * @param string $msg
     * @param int $errcode
     * @param Throwable $previous
     */
    public function __construct($msg = '', $errcode = 0, $previous = null)
    {
        parent::__construct($msg, $errcode, $previous);
    }


    /**
     * show() funkcija prikazuje errore na stranicu
     * 
     * @return string
     */
    public function show()
    {
        return('Error: '. $this->getMessage() .
            'File: ' . $this->getFile() .
            'Line: ' .$this->getLine() .
            'StackTrace: ' .$this->getTraceAsString()
        );
    }
}
