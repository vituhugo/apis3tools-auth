<?php require __DIR__."/core/config/constantes.php"; require __DIR__."/../constantes.php"; ?>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo URL_ROOT ?>bower_components/material-design-lite/material.min.css">
        <link rel="stylesheet" href="<?php echo URL_ROOT ?>bower_components/dialog-polyfill/dialog-polyfill.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <meta charset="UTF-8">

        <style>
            .mdl-layout {
                align-items: center;
                justify-content: center;
            }
            .mdl-layout__content {
                padding: 24px;
                flex: none;
            }
            .mdl-dialog {
                width: 560px;
            }
            .container-img {
                float: left;
                margin: 30px 15px;
            }
            .container-texto {
                float: left;
                text-align: right;
            }
            .mdl-color--primary {
                background-color: #fcae18 !important;
            }
        </style>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
            <main class="mdl-layout__content">
                <div class="mdl-card mdl-shadow--6dp">
                    <div class="mdl-card__supporting-text">
                        <h1 class="mdl-card__title-text"> Opss! </h1>
                    </div>
                    <p class="mdl-card__supporting-text">Não foi possível acessar o sistema atráves dessa conta Google. Por favor, certifique-se que a mesma pertença ao dominio Apis3.</p>
                    <p class="mdl-card__supporting-text">Para tentar efetuar o login novamente, clique no botão abaixo.
                        <br>
                        <br>
                        <button id="sign-out-button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Trocar de Conta</button>
                    </p>
                    <p class="mdl-card__supporting-text">Caso o erro persista, entre em contato com o desenvolvedor responsável através do email: <br><br> <b><?php echo EMAIL_DEV_RESP ?></b></p>
                </div>
            </main>
        </div>
    </body>
    <script>
        document.getElementById('sign-out-button').onclick = function() {
            function popupClose()
            {
                popup.close();
                window.location.href = "<?php echo AFTER_LOGOUT_REDIRECT_URL; ?>";
            }

            var popup = window.open("https://accounts.google.com/logout", "google account - logout", "width=400, height=250");
            setTimeout(popupClose, 1300);
        };
    </script>
</html>
