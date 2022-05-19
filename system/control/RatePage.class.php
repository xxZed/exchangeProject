<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/RateHandler.class.php');


class RatePage extends AbstractPage{
    public function code()
    {
        if(RateHandler::checkIfEmpty()){
            RateHandler::updateLatest();
        }
    }
}