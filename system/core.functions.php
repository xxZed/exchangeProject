<?php

/**
 * showErrors prikazuje errore iz AppCore 
 * 
 * @param Exception
 * 
 */

function showErrors($e){
    echo ("
            Error: " . $e->getMessage() .
            "File: " . $e->getFile() .
            "Line: " . $e->getLine() .
            "StackTrace: "  . $e->getTraceAsString()
        );
}