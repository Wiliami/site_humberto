<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Plataforma | Humberto Oliveira</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content=""> 
        <link rel="stylesheet" href="<?= BASE ?>/src/css/index.css" type="text/css">
        <link href="'. BASE .'/res/site/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="<?= BASE ?>/res/site/css/sb-admin-2.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?= $Component->getMenu(); ?>
    <header class="bg-dark py-5">
        <div class="overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">Título do curso</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Descrição do curso</p>
                </div>
            </div>
        </div>
    </header>
</body>
<?= $Component->getFooterDashboard(); ?>