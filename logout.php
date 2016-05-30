<?php require __DIR__."/core/config/constantes.php";
unset($_SESSION['USER'], $_SESSION['TOKEN']);

header("Location: ".SESSION_LOST_REDIRECT_URL);