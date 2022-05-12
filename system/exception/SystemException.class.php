<?php

require_once('GeneralException.class.php');

class SystemException extends GeneralException
{
    public function __construct($msg = '', $errcode = 0, $previous = null)
    {
        parent::__construct($msg, $errcode, $previous);
    }

    public function show()
    {
        return('Error: '. $this->getMessage() .
            'File: ' . $this->getFile() .
            'Line: ' .$this->getLine() .
            'StackTrace: ' .$this->getTraceAsString()
        );
    }
}
