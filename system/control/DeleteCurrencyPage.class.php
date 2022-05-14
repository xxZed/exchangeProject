<?php

require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrency.class.php');

class DeleteCurrencyPage{
    public function __construct()
    {
        if(isset($_GET['code'])){
            $code = strtoupper($_GET['code']);
            if(CRUDCurrency::checkCurrency($code)){
                CRUDCurrency::deleteCurrency($code);
                echo "Currency deleted";
            } else {
                echo $code . " Currency does not exist in crud_currency table";
            }
        }else {
            echo "Cannot find currency code";
        }
    }
}