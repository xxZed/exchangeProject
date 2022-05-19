<?php
require(SYSTEM . 'model/AbstractPage.class.php');

class IndexPage extends AbstractPage{
    public function code()
    {
        $this->templateName = 'currency';       

        $status = "
        http://localhost/exchangeProject/index.php?page=Currency " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=Rate" . "<br><br><br>" . "
        http://localhost/exchangeProject/index.php?page=CreateCurrency&currency=USD " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=DeleteCurrency&currency=USD " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=Convert&currencyCodeOne=USD&currencyCodeTwo=EUR&amount=100" . "<br>" . "
        <br><br> http://localhost/exchangeProject/index.php?page=Rate
        ";

        $this->v['var1'] = $status;
    }
}
