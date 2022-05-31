<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/ConverterHandler.class.php');

//"http://localhost/exchangeProject/index.php?page=Convert&currencyCodeOne=USD&currencyCodeTwo=EUR&amount=100"

/**
 * @author Zdeslav Nazlic, Marin Marincic
 *
 * ConvertPage klasa upravlja sa konvertiranjem currencies-a
 */
class ConvertPage extends AbstractPage
{
    /**
     * code() implementirana funkcija iz AbstractPage-a pomocu GET-a uzima currency imena iz URL i iznos koji se konvertira
     * rezultat se salje u coverter.tpl.php gdje se prikazuje
     */
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
