<?php

/**
 * apiHandle upravlja s API dijelom ovog projekta
 */
class apiHandle
{
    /**
     * latestRate vraca najnovije rate currencies-a
     * 
     * @return JSON 
     */
    public static function latestRate()
    {
        return json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='" . ID_API . "'"), true);
    }

    /**
     * historyRate vraca povijest na odredeni datum
     * 
     * @return JSON 
     */
    public static function historyRate($userDate)
    {
        return json_decode(file_get_contents("https://openexchangerates.org/api/historical/$userDate.json?app_id='" . ID_API . "'"), true);
    }
    
    /**
     * allCurrencies vraca najnovije sve currencies
     * 
     * @return JSON 
     */
    public static function allCurrencies()
    {
        return json_decode(file_get_contents('https://openexchangerates.org/api/currencies.json'), true);
    }
}
