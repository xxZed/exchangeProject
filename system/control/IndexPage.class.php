<?php


class IndexPage{
    public function __construct()
    {
        echo ("
        http://localhost/exchangeProject/index.php?page=Currency " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=Rate" . "<br><br><br>" . "
        http://localhost/exchangeProject/index.php?page=CreateCurrency&code=USD " . "<br>" . "
        http://localhost/exchangeProject/index.php?page=DeleteCurrency&code=USD " . "<br>" . "
        <br><br> http://localhost/exchangeProject/index.php?page=Rate
        ");
    }
}
