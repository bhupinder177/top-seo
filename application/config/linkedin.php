<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  LinkedIn API Configuration
| -------------------------------------------------------------------
|
| To get an facebook app details you have to create a Facebook app
| at Facebook developers panel (https://developers.facebook.com)
|
|  linkedin_api_key        string   Your LinkedIn App Client ID.
|  linkedin_api_secret     string   Your LinkedIn App Client Secret.
|  linkedin_redirect_url   string   URL to redirect back to after login. (do not include base URL)
|  linkedin_scope          array    Your required permissions.
*/
// clientid:81x4lzbas5yeyd
// Client Secret:wKRIwrvf77s33BKq
$config['linkedin_api_key']       = '81x4lzbas5yeyd';
$config['linkedin_api_secret']    = 'wKRIwrvf77s33BKq';
$config['linkedin_redirect_url']  = 'user_authentication/';
$config['linkedin_scope']         = 'r_basicprofile r_emailaddress';


?>
