<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrencyHandler.class.php');
require(SYSTEM . 'model/AbstractPage.class.php');

class CreateCurrencyPage extends AbstractPage
{
    public function code()
    {
        $this->templateName = 'createcurrency';
        $currency = strtoupper($_GET['currency']);

        if (!CRUDCurrency::checkCurrency($currency)) {
            CRUDCurrency::createCurrency($currency);
            $status = "Currency created";
            $this->v['var1'] = $status;
        } else {
            $status = "Currency exists";
            $this->v['var1'] = $status;
        }
    }
}
