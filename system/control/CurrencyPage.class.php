<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'model/AbstractPage.class.php');


/**
 * CurrencyPage klasa koja obraduje podatke iz API za currency
 * 
 * @author Zdeslav Nazlic, Marin Marincic
 */
class CurrencyPage extends AbstractPage
{
    /**
     * code() implementirana funkcija iz AbstractPage-a, unosi sve currencies iz API-a
     * rezultat se salje u coverter.tpl.php gdje se prikazuje
     */
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
