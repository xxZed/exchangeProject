<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/RateHandler.class.php');


class RatePage extends AbstractPage
{
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
