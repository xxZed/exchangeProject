<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrency.class.php');

class CreateCurrencyPage extends AbstractPage{
    public function code()
    {
        $this->templateName = 'currency';
        
        if(CurrenciesHandler::checkCurrency($_GET['currency'])){
            $currency = strtoupper($_GET['currency']);
            
            if(!CRUDCurrency::checkCurrency($currency)){
                CRUDCurrency::createCurrency($currency);
            } else {
                $status = "Currency exists";
                $this->v['var1'] = $status;
            }
        }else {
            $errorMsg = "if(CurrenciesHandler::checkCurrency(GET['currency']))";
            $this->v['var1'] = $errorMsg;
        }
    }
}