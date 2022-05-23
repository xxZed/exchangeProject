<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'model/AbstractPage.class.php');

class CurrencyPage extends AbstractPage
{
    public function code()
    {
        $this->templateName = "currency";

        if (!CurrenciesHandler::checkAllCurrencies()) {
            CurrenciesHandler::insertCurrency();
            $status = "Currenices added";
            $this->v['var1'] = $status;
        } else {
            $errorMsg = "Currenices already added";
            $this->v['var1'] = $errorMsg;
        }
    }
}
