<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrencyHandler.class.php');
require(SYSTEM . 'model/AbstractPage.class.php');


/**
 * ReadCurrenciesPage klasa za ispis svih currencies-a
 * 
 * @author Zdeslav Nazlic, Marin Marincic
 */
class ReadCurrenciesPage extends AbstractPage
{
    /**
     * code() funkcija koja poziva readCurrency() te rezultat salje svom tpl.php file-u
     */
    public function code()
    {
        $this->templateName = 'readcurrencies';

        $status = CRUDCurrency::readCurrency();

        $this->v['var1'] = json_encode($status);
    }
}
