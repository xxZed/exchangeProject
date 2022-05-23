<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrencyHandler.class.php');
require(SYSTEM . 'model/AbstractPage.class.php');

class ReadCurrencyPage extends AbstractPage
{
    public function code()
    {
        $this->templateName = 'readcurrency';

        $currencyCode = $_GET['currency'];
        $status = CRUDCurrency::getCurrency($currencyCode);

        if (!empty($status)) {
            $this->v['var1'] = json_encode($status);
        } else {
            $errorMsg = "No currency with $currencyCode name";
            $this->v['var1'] = $errorMsg;
        }
    }
}
