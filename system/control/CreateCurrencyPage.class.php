<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrencyHandler.class.php');
require(SYSTEM . 'model/AbstractPage.class.php');

/**
 * CreateCurrencyPage klasa za obradu currency-a koje korisnik zeli create-at
 * 
 * @author Zdeslav Nazlic, Marin Marincic
 */
class CreateCurrencyPage extends AbstractPage
{
    /**
     * code() implementirana funkcija iz AbstractPage-a pomocu GET-a uzima currency imena iz URL (3 letter code)
     * funckija to ime salje CRUDCurrencyHandler-u
     * rezultat se salje u createcurrency.tpl.php gdje se prikazuje
     */
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
