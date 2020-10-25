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

// Ability to overwrite default options and headers
$config = [
	'options' => [
		CURLOPT_CONNECTTIMEOUT => 5,
	],
];

/*
 * Login to Salesforce
 */
$salesforceApi = new Api($baseUrl, $version, $consumerKey, $consumerSecret, Api::RETURN_ARRAY_A, $config);
$salesforceApi->login($username, $password, $securityToken);

/*
 * Test different methods
 */
$apiVersions = $salesforceApi->getApiVersions();

$goodMetadata = $salesforceApi->getObjectMetadata('Account');
$goodMetadataAll = $salesforceApi->getObjectMetadata('Account', true);
$goodMetadataSince = $salesforceApi->getObjectMetadata('Account', true, (new \DateTime()));
$badMetadata = $salesforceApi->getObjectMetadata('SomeOtherObject');

$createAccount = $salesforceApi->create('Account', ['name' => 'New Account']);
$updateAccount = $salesforceApi->update('Account', $createAccount->id, ['name' => 'Changed']);
$account = $salesforceApi->get('Account', $createAccount->id);
$getAccountFields = $salesforceApi->get('Account', $createAccount->id, ['Name', 'OwnerId']);
$deleteAccount = $salesforceApi->delete('Account', $createAccount->id);

/*
 * Test search (will create a SOQL query)
 */
$searchResponse = $salesforceApi->search('SELECT name from Position__c', true);
