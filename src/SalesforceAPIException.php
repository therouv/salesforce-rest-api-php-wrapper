<?php namespace SalesforceAPI;

use Exception;

class SalesforceAPIException extends Exception
{
    public $curl_info = null;
}