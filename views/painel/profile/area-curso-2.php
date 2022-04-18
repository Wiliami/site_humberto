<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Plataforma</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link id="pagestyle" href="<?= BASE ?>/src/css/material-kit.css?v=3.0.0" rel="stylesheet" />
        <!-- <link rel="stylesheet" href="' . BASE . '/src/css/menu-active.css" type="text/css"> -->
        <!-- Estiliza todos os ícons de deshboard -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                     <!-- Illustrations -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Comentários</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-start">
                                <img class="img-profile rounded-circle ml-2" style="width: 40px; height: 40px;" src="<?= BASE ?>/src/images/undraw_profile.svg">
                                <textarea class="form-control ml-3" id="comment" name="comment" placeholder="Escreva seu comentário..." rows="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" form="form1" class="btn btn-danger mt-3 ml-auto p-2" name="enviar" value="Publicar">
                            </div>
                            <a href="" class="btn-sm btn-light" title="Editar comentário"><i class="fas fa-edit"></i></a>   
                            <a href="" class="btn-sm btn-light ml-2" title="Excluir comentário"><i class="fas fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>