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
 * Composite methods
 */
// create accounts
$createAccounts = $salesforceApi->compositeCreate([
    [
        'attributes' => ['type' => 'Account'],
        'Name' => 'example.com',
        'BillingCity' => 'San Francisco'
    ], [
        'attributes' => ['type' => 'Contact'],
        'LastName' => 'Johnson',
        'FirstName' => 'Erica',
    ]
], true);

// update accounts
$updateAccounts = $salesforceApi->compositeUpdate([
    [
        'id' => $createAccounts[0]['id'],
        'attributes' => ['type' => 'Account'],
        'NumberOfEmployees' => 27000,
    ], [
        'id' => $createAccounts[1]['id'],
        'attributes' => ['type' => 'Contact'],
        'Title' => 'Lead Engineer',
    ]
], true);

// get accounts by object name
$accounts = $salesforceApi->compositeGet('Account', [$createAccounts[0]['id']], ['id', 'name']);

// delete accounts
$deleteAccounts = $salesforceApi->compositeDelete([$createAccounts[0]['id'], $createAccounts[1]['id']]);
