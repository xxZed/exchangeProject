<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');


class CurrencyPage extends AbstractPage{
    public function code()
    {
        if(!CurrenciesHandler::checkAllCurrencies()){
            CurrenciesHandler::insertCurrency();
        }
    }
}
