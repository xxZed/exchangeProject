<?php

require(SYSTEM . 'util/RateHandler.class.php');


class RatePage{
    public function __construct()
    {
        if(RateHandler::checkIfEmpty()){
            RateHandler::updateLatest();
        }

    }
}