<?php
require __DIR__."/config/constantes.php";
require VENDOR_PATH."autoload.php";

use League\OAuth2\Client\Provider\Google;

session_start();

$clientId = API_CLIENT_KEY;
$clientSecret = API_CLIENT_SECRET;
$redirectUri = API_REDIRECT_URI;

$provider = new Google(compact('clientId','clientSecret','redirectUri'));

return $provider;