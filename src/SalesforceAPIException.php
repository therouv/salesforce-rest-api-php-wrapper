<?php namespace SalesforceRestAPI;

use Exception;

/**
 * Class SalesforceAPIException
 * @package SalesforceRestAPI
 */
class SalesforceAPIException extends Exception
{

    /**
     * @var null
     */
    public $curlInfo = null;

    /**
     * Constructor
     *
     * @param string $message
     * @param null   $curlInfo
     * @param int    $code
     * @param Exception $previous
     */
    public function __construct($message = "", $curlInfo = null, $code = 0, Exception $previous = null)
    {
        $this->curlInfo = $curlInfo;

        parent::__construct($message, $code, $previous);
    }

}