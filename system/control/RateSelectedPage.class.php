<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/RateHandler.class.php');

//http://localhost/exchangeProject/index.php?page=RateSelected&currencyCode=EUR
//YYYY-MM-DD.json


/**
 * RateSelectedPage klasa za obradu selektriranog currency-a
 * 
 * @author Zdeslav Nazlic, Marin Marincic
 */
class RateSelectedPage extends AbstractPage
{
    /**
     * pomocu GET uzima 3letter code iz URL-a te svom tpl.php file-u salje
     * sve podatke vezane za currency koji selektiramo
     */
    public function code()
    {
        $this->templateName = 'rateselected';

        $currencyCode = $_GET['currencyCode'];

        $status = RateHandler::getRateSelected($currencyCode);

        if (!empty($status)) {
            $this->v['var1'] = json_encode($status);
        } else {
            $errorMsg = "No currency & rate with $currencyCode name";
            $this->v['var1'] = $errorMsg;
        }
    }
}
