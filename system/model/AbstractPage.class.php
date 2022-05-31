<?php


/**
 * AbstractPage je abstract class koju svi kontroleri nasljeduju
 */
abstract class AbstractPage
{
    /**
     * __construct poziva code i show funkcije 
     */
    function __construct()
    {
        $this->code();
        $this->show();
    }

    /**
     * code() funkciju sve klase koje nasljeduju AbstractrPage i implementriaju
     */
    abstract function code();

    /**
     * show() funkcija poziva salje elemente koje kontroler zeli printat na stranicu.
     */
    function show()
    {
        $v = $this->v ?? [];

        include(SYSTEM . 'view/' . $this->templateName . '.tpl.php');
    }
}
