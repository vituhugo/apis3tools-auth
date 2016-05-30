<?php
$provider = require __DIR__."/core/provider.php";

if (empty($_SESSION['TOKEN'])) {
    $_SESSION['redirect_referer'] = $_SERVER['HTTP_REFERER'];
    header('Location: '. SESSION_LOST_REDIRECT_URL);
    die;
}

$token = unserialize($_SESSION['TOKEN']);
try
{
    $userDetails = $provider->getResourceOwner($token);

} catch (Exception $e)
{
    unset($_SESSION['TOKEN'], $_SESSION['USER'], $_SESSION['oauth2state']);
    header('Location: '. SESSION_LOST_REDIRECT_URL);
    exit;
}

if ($userDetails->getEmail() !== $_SESSION['USER']['emails'][0]['value']) {
    unset($_SESSION['TOKEN'], $_SESSION['USER'], $_SESSION['oauth2state']);
    header("Location: ". AUTH_ROOT_URL ."logout.php");
    exit;
}
