<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrencyHandler.class.php');

class DeleteCurrencyPage extends AbstractPage
{
    public function code()
    {
        $this->templateName = 'currency';       
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
