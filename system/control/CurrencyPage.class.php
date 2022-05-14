<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');


class CurrencyPage{
    public function __construct()
    {
        if(!CurrenciesHandler::checkAllCurrencies()){
            CurrenciesHandler::insertCurrency();
        }
    }
}
