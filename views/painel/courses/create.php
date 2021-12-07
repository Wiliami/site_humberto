<?php
    $User = new User();
    $User->verifyExistLoginUser();
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página | Create</title>
        <!-- <link rel="stylesheet" href="<?= BASE?>/src/css/index.css"> -->
        <link href="<?= BASE ?>/res/site/css/sb-admin-2.min.css" rel="stylesheet">


    </head>
    <body>

    <?php
        $Component = new Component();
        echo $Component->getMenu();
    ?>

    <form action="" method="post">
        <div>
            <label for="nome">Título:</label>
            <input type="text" id="nome" />
        </div>
        <div>
            <label for="email">Categoria:</label>
            <input type="email" id="email" />
        </div>
        <div>
            <label for="msg">Mensagem:</label>
            <textarea id="msg"></textarea>
        </div>
    </form>


    <?php
        $Component = new Component();
        echo $Component->getFooterDashboard();
    ?>

    </body>
</html>