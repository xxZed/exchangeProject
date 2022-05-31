<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrencyHandler.class.php');


/**
 * DeleteCurrencyPage klasa koja sadrzi funkciju za deletat odredeni currency
 * 
 * @author Zdeslav Nazlic, Marin Marincic
 */
class DeleteCurrencyPage extends AbstractPage
{
    /**
     * funkcija code prvo provjerava je li currency postoji te ako postoji delete-a ga iz currency table-a
     * status ili errorMsg se salje deeltecurrency.tpl.php
     */
    public function code()
    {
        $this->templateName = 'deletecurrency';
        $code = strtoupper($_GET['currency']);

        if (CRUDCurrency::checkCurrency($code)) {
            CRUDCurrency::deleteCurrency($code);
            $status = "Currency deleted";
            $this->v['var1'] = $status;
        } else {
            $errorMsg = '' . $code . " Currency does not exist in crud_currency table";
            $this->v['var1'] = $errorMsg;
        }
    }
}
