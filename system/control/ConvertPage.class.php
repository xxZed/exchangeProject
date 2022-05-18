<?php
require(SYSTEM . 'model/AbstractPage.class.php');

require(SYSTEM . 'util/ConverterHandler.class.php');

//"http://localhost/exchangeProject/index.php?page=DeleteCurrency&currencyCodeOne=USD&currencyCodeTwo=EUR&amount=100"



class ConvertPage extends AbstractPage
{
    public function code()
    {
        $currencyOne = $_GET['currencyCodeOne'];
        $currencyTwo = $_GET['currencyCodeOne'];
        $amount = $_GET['currencyCodeOne'];

        $result = ConverterHandler::Convert($currencyOne, $currencyOne, $amount);

        $this->templateName = 'converter';
        $this->v['var1'] = $result;
    }
}
