<?php
const EMAIL_DEV_RESP = "dev@apis3.com.br";

//CAMINHOS FISICOS
define("VENDOR_PATH", __DIR__."/../../vendor/");

//URL INTERNAS E DE REDIRECIONAMENTO.
const AUTH_ROOT_URL = "/apis3tools/auth/";
const AFTER_LOGIN_REDIRECT_URL = "/apis3tools/";
const SESSION_LOST_REDIRECT_URL = AUTH_ROOT_URL;
const AFTER_LOGOUT_REDIRECT_URL = SESSION_LOST_REDIRECT_URL;
define("WRONG_EMAIL_SCREEN_URL", AUTH_ROOT_URL . "error_logout.php");

//Credenciais da API
const API_CLIENT_KEY = 'EXAMPLEexampleEXAMPLEexample.apps.googleusercontent.com';
const API_CLIENT_SECRET = 'SecretEXEMPLE';
const API_REDIRECT_URI = "http://example.url/auth";