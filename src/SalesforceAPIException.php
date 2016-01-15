<?php namespace SalesforceRestAPI;

use Exception;

class SalesforceAPIException extends Exception
{
    public $curl_info = null;

}