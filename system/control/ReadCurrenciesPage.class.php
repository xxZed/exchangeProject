<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrencyHandler.class.php');
require(SYSTEM . 'model/AbstractPage.class.php');

class ReadCurrenciesPage extends AbstractPage
{
    public function code()
    {
        $this->templateName = 'readcurrencies';

        $status = CRUDCurrency::readCurrency();

        $this->v['var1'] = json_encode($status);
    }
}
