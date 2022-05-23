<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/HistoryRateHandler.class.php');

//http://localhost/exchangeProject/index.php?page=History&history=2022-01-03
//YYYY-MM-DD.json


// USE AT YOUR OWN RISK .... 

class HistoryPage extends AbstractPage
{
    public function code()
    {
        $this->templateName = 'history';

        //$date = $_GET['history'];

        if (HistoryRateHandler::checkIfEmpty()) {
            $errorMsg = "History empty in database";           
            $this->v['var1'] = json_encode($errorMsg);
        } else {
            $status = HistoryRateHandler::readHistory();            
            $this->v['var1'] = json_encode($status);
            
        }
    }
}
