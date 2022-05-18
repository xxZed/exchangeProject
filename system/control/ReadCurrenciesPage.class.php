<?php
require(SYSTEM . 'util/CurrenciesHandler.class.php');
require(SYSTEM . 'util/CRUDCurrency.class.php');


class ReadCurrenciesPage extends AbstractPage{
    public function show(){
        $this->templateName = 'currency';       

        $status = CRUDCurrency::readCurrency();

        $this->v['var1'] = $status;
    }
}