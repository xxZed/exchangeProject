<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/ConverterHandler.class.php');

//"http://localhost/exchangeProject/index.php?page=Convert&currencyCodeOne=USD&currencyCodeTwo=EUR&amount=100"



class ConvertPage extends AbstractPage
{
    public function code()
    {
        $currencyOne = $_GET['currencyCodeOne'];
        $currencyTwo = $_GET['currencyCodeTwo'];
        $amount = $_GET['amount'];

        $result = ConverterHandler::Convert($currencyOne, $currencyTwo, $amount);

        $this->templateName = 'converter';
        $this->v['var1'] = $result;
    }
}
