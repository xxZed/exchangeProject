<?php

define('SYSTEM', '/xampp/htdocs/exchangeProject/system/');


require_once(SYSTEM . 'util/CurrenciesHandler.class.php');
require_once(SYSTEM . 'util/RateHandler.class.php');

abstract class Page{
    public function __construct()
    {
        $page = $this->customCode();
        if(!CurrenciesHandler::checkAllCurrencies()){
            CurrenciesHandler::insertCurrency();
        }
        RateHandler::updateLatest();
    }

    abstract function customCode();
}