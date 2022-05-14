<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrency.class.php');

class CreateCurrencyPage{
    public function __construct()
    {
        if(CurrenciesHandler::checkCurrency($_GET['code'])){
            $code = strtoupper($_GET['code']);
            
            if(!CRUDCurrency::checkCurrency($code)){
                CRUDCurrency::createCurrency($code);
            } else {
                echo "Currency exists";
            }
        }else {
            echo "if(CurrenciesHandler::checkCurrency(GET['code']))";
        }
    }
}