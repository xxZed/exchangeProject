<?php
require('Page.class.php');

class CurrencyPage extends Page{
    public function customCode()
    {
        if (CurrenciesHandler::checkCurrency($_GET['code'])) {

            $code = strtoupper($_GET['code']);
            var_dump($code);
        }
    }
}
