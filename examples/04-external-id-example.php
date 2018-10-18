<?php

use Salesforce\Rest\Api;

/*
 * Define connection details
 */
$baseUrl = 'https://test.salesforce.com'; // Live: login.salesforce.com | Test: test.salesforce.com
$version = '43.0'; // Latest release: Summer '18
$consumerKey = '<Consumer_Key>';
$consumerSecret = '<Consumer_Secret>';
$username = '<Salesforce_User_Login>';
$password = '<Salesforce_User_Password>';
$securityToken = '<Salesforce_User_Security_Token>';

/*
 * Login to Salesforce
 */
$salesforceApi = new Api($baseUrl, $version, $consumerKey, $consumerSecret);
$salesforceApi->login($username, $password, $securityToken);

/*
 * External id methods
 */
// create account
$newAccount = $salesforceApi->createByExternalId('Account', 'customExtIdField__c', 11999, [
    'Name' => 'California Wheat Corporation',
    'Type' => 'New Customer',
]);

// update account
$updateAccount = $salesforceApi->updateByExternalId('Account', 'customExtIdField__c', 11999, [
    'BillingCity' => 'San Francisco',
]);

// get account by external id
$account = $salesforceApi->getByExternalId('Account', 'customExtIdField__c', 11999);

// delete account
$deleteAccount = $salesforceApi->deleteByExternalId('Account', 'customExtIdField__c', 11999);
