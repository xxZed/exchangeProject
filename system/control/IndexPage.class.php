<?php
require(SYSTEM . 'model/AbstractPage.class.php');

/**
 * IndexPage je klasa koja prikazuje sve moguce radnje koji projekt moze napraviti
 * 
 * @author Zdeslav Nazlic, Marin Marincic
 */
class IndexPage extends AbstractPage
{
    /**
     * code() funkcija koja u svom statusu sadrzi sve moguce URL-ove koje korisnik moze napraviti
     * status se salje u svoj tpl.php file
     */
    public function code()
    {
        $this->templateName = 'currency';

        $status = "
        http://localhost/exchangeProject/index.php?page=Currency " . "<br>" . "
        " . "<br><br><br>" . "
        http://localhost/exchangeProject/index.php?page=ReadCurrencies " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=CreateCurrency&currency=EUR " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=ReadCurrency&currency=EUR " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=DeleteCurrency&currency=EUR " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=RateSelected&currencyCode=EUR " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=Convert&currencyCodeOne=USD&currencyCodeTwo=EUR&amount=100" . "<br>" . "
        <br><br> 
        http://localhost/exchangeProject/index.php?page=Rate " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=HistoryByDate&history=2022-05-23" . "<br>" . "
        http://localhost/exchangeProject/index.php?page=History
        ";

        $this->v['var1'] = $status;
    }
}
