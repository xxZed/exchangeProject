<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/RateHandler.class.php');



/**
 * class RatePage extenda AbstractPage te sadrzi funkciju code() koja obraduje rates za database
 */
class RatePage extends AbstractPage
{
    /**
     * code() provjerava je li prazan table te ako je prazan inserta najnovije rate-ove za currencies,
     * ako je pun to znaci da ce updateat tecaje za najnoviji datum, tj insertat najnovije iznad starij rates-a
     */
    public function code()
    {
        $this->templateName = 'rate';
        if (RateHandler::checkIfEmpty()) {
            RateHandler::updateLatest();
            $status = "Rates downloaded";
            $this->v['var1'] = $status;
        } else {
            RateHandler::updateLatest();
            $status = "Rates updated";
            $this->v['var1'] = $status;
        }
    }
}
