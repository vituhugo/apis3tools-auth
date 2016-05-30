<?php

$provider = require __DIR__."/core/provider.php";

if (empty($_GET['code']))
    //Se não houver Código redirecionar para página de authenticação
    header("Location: ". getGoogleAuthUrl());

else {
    //Retorno da página de autenticação, valida as informações e grava em sessão
    $token = getAccessToken($_GET['code']);
    setOwnerInfoInSession($token);

    if (validEmailSession())
    {
        $location = AFTER_LOGIN_REDIRECT_URL;
        if (!empty($_SERVER['redirect_referer'])) {
            $location = $_SERVER['redirect_referer'];
            unset($_SERVER['redirect_referer']);
        }
        header("Location: ". $location);
    } else {
        header("Location: ". WRONG_EMAIL_SCREEN_URL);
    }
}

function validEmailSession()
{
    $dominis_validos = ["@apis3.com", "@apis3.com.br"];

    $email = $_SESSION['USER']['emails'][0]['value'];
    $dominio = strstr($email, "@");

    if (!in_array($dominio, $dominis_validos)) {
        unset($_SESSION['USER'], $_SESSION['TOKEN']);
        return false;
    }

    return true;
}

function setOwnerInfoInSession($token)
{
    global $provider;
    try
    {
        $ownerDetails = $provider->getResourceOwner($token);
        $_SESSION['USER'] = $ownerDetails->toArray();
        $_SESSION['TOKEN'] = serialize($token);

    } catch (Exception $e)
    {
        exit('Something went wrong: ' . $e->getMessage());
    }
}

function getGoogleAuthUrl()
{
    global $provider;

    $_SESSION['oauth2state'] = $provider->getState();

    $authUrl = $provider->getAuthorizationUrl();
    return $authUrl;
}

function getAccessToken($code)
{
    global $provider;

    return $provider->getAccessToken(
        'authorization_code',
        ['code' => $code]
    );
}