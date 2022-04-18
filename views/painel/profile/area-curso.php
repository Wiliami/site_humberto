<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
$courseId = filter_input(INPUT_GET, 'curso', FILTER_VALIDATE_INT);
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
        <header class="bg-dark py-5">
            <div class="overlay"></div>
            <div class="container">
                <div class="d-flex justify-content-start">
                    <p style="font-size: 12px;">Categoria do curso do curso</p>
                    <p style="font-size: 12px;">Categoria</p>
                </div>
                <div class="d-flex text-center align-items-center justify-content-between">
                    <div class="my-5 text-center text-xl-start">
                        <?php 
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$courseId}");
                        if($Read->getResult()) {
                            $DataCourse = $Read->getResult()[0];
                                ?>
                        <h1 class="display-5 fw-bolder text-white mb-2"><?= $DataCourse['curso_titulo'] ?></h1>
                        <p class="lead fw-normal text-white-50 mb-4"><?= $DataCourse['curso_descricao']?></p>
                        <?php
                        }
                        ?>
                    </div>
                    
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- <img src="<?= BASE ?>/src/images/thumbnail-course.jpg" class="rounded-top" alt="capa do curso" style="height: 250px; width: 400px;"> -->
                                    <video width="320" height="240" style="border-radius: 8px;" controls>
                                        <source src="<?= BASE ?>/src/video" type="video/mp4">
                                    </video>
                                    <h6 class="m-0 font-weight-bold text-primary mt-2">Pré-visualização do curso</h6>
                                </div>
                                <div class="py-3 d-flex flex-column align-items-start">
                                    <h6 class="m-0 font-weight-bold text-dark">R$30,00</h6>
                                    <span>Descrições do curso</span>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="<?= BASE ?>/painel/profile/courses/compra-curso" class="btn btn-danger">Adicionar ao carrinho</a>
                                    <a href="<?= BASE ?>/painel/profile/courses/compra-curso" class="btn btn-outline-danger">Comprar agora</a>
                                </div>
                            </div>
                    </div>

                </div>

                <div class="d-flex justify-content-start">
                    <p style="font-size: 12px;">Atualização do curso</p>
                    <p style="font-size: 12px;">Linguaguem do curso</p>
                </div>
            </div>
        </header>

        <div class="container mt-3">
            <div class="card-body flex-column align-items-start bg-light rounded">
                <h5 class="mb-1 text-dark">O que você aprenderá:</h5>    
                <ul class="mt-2">
                    <li>Item 1</li>
                    <li>Item 2</li>
                    <li>Item 3</li>
                    <li>Item 4</li>
                    <li>Item 5</li> 
                </ul>
            </div>

            <h5 class="mb-1 mt-5">Conteúdo do curso:</h5>    
            <div class="d-flex flex-row">
                <p class="ml-auto p-2" style="font-size: 12px;">Número de Módulos</p>
                <p class="p-2" style="font-size: 12px;">Total de aulas</p>
    
                <p class="p-2" style="font-size: 12px;">Total de horas do curso</p>
            </div>
            <div class="list-group">
                <div class="list-group-item flex-column align-items-start bg-light">
                    <nav class="text-dark">
                        <li>Conteúdo 1</li>
                        <li>Conteúdo 2</li>
                        <li>Conteúdo 3</li>
                        <li>Conteúdo 4</li>
                        <li>Conteúdo 5</li>
                        <li>Conteúdo 6</li>
                    </nav>
                </div>
            </div>

            <h5 class="mb-1 mt-5">Requisitos:</h5>    
            <div class="d-flex">
                <nav>
                    <li>Requisito 1</li>
                    <li>Requisito 2</li>
                    <li>Requisito 3</li>
                </nav>
            </div>

            <h5 class="mb-1 mt-5">Descrição:</h5>    
            <div class="d-flex">
            <p>Descrição completa do curso</p>
            </div>
        </div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto" style="font-size: 10px">
                    <span>Copyright &copy; Unitplus <?= date('Y') ?> </span>
                </div>  
            </div>
        </footer>
    </body>
</html>