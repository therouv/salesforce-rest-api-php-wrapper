<?php

use Salesforce\Rest\Api;
use Salesforce\Rest\Job;

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
 * Create job and add batch data
 */
$job = $salesforceApi->createJob(Job::OPERATION_INSERT, 'Lead', Job::TYPE_JSON);
$users = [
    [
        'FirstName' => 'jon',
        'LastName'  => 'doe',
        'Phone'     => '801-555-2423',
        'Email'     => 'jon@doe.com',
    ],
];
$batchInfo = $salesforceApi->addBatch($job, $users);
$job = $salesforceApi->closeJob($job);

sleep(10); // wait for salesforce to process the batch
$batchInfo = $salesforceApi->getBatchInfo($job, $batchInfo);
$batchResult = $salesforceApi->getBatchResults($job, $batchInfo);

// abort job
$job2 = $salesforceApi->createJob(Job::OPERATION_INSERT, 'Lead', Job::TYPE_JSON);
$job2 = $salesforceApi->abortJob($job2);
