Salesforce REST API PHP Wrapper
===============================

This is a PHP Wrapper for the Salesforce Rest API.

It currently uses the just the Username-Password (http://www.salesforce.com/us/developer/docs/api_rest/) authentication flow. 

To retrieve your consumer key and secret, you will need to login to the instance (or sandbox instance). Click Setup at the top of the 
page and then navigate to Create -> Apps. Here you will see several types of applications: Apps, Subtab Apps, and Connected Apps. Click 
the New button inside the Connected Apps section. Fill out the required form fields and check the Enable OAuth Settings checkbox. When 
using the username/password grant type, the Callback URL is not required, however you will still be required to enter a value.  

Note on Sandboxes: To create a new sandbox instance, login to your main salesforce instance. Click Setup at the top of the screen and 
navigate to Deploy -> Sandboxes. Here you can choose a type of sandbox to deploy. 

To see available API versions, you can navigate to https://<your-instance-subdomain>.salesforce.com/services/data
Generally you should be fine to use the most recent version. I use version 35.0.

The Security Token used for login is emailed to the user on creation and when they reset their password. If you do not have access
to this information, you will most likely need to reset the user's password. 

