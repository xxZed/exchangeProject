<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/RateHandler.class.php');

//http://localhost/exchangeProject/index.php?page=RateSelected&currencyCode=EUR
//YYYY-MM-DD.json


// USE AT YOUR OWN RISK .... 

class RateSelectedPage extends AbstractPage
{
    public function code()
    {
        $this->templateName = 'rateselected';

        $currencyCode = $_GET['currencyCode'];

        $status = RateHandler::getRateSelected($currencyCode);

        if(!empty($status)){
            $this->v['var1'] = json_encode($status);
        } else {
            $errorMsg = "No currency & rate with $currencyCode name";
            $this->v['var1'] = $errorMsg;
        }
    }
}