<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
$courseId = filter_input(INPUT_GET, 'curso', FILTER_VALIDATE_INT);
$moduleId = filter_input(INPUT_GET, 'm', FILTER_VALIDATE_INT);
?>
<div class="container">
    <div class="row">
        <div class="bg-dark py-5 mt-4 col-md-8">
            <div style="font-size: 12px;" class="d-inline">Categoria do curso</div>|
            <div style="font-size: 12px;" class="d-inline">Categoria</div>
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
            </div>  
            <div class="d-inline" style="font-size: 12px;">Atualização do curso</div>|
            <div class="d-inline" style="font-size: 12px;">Linguaguem do curso</div>
        </div>
            
        <div class="card shadow col-md-4 mt-4">
            <div class="card-body">
                <div class="text-center">
                    <!-- <img src="<?= BASE ?>/src/images/thumbnail-course.jpg" class="rounded-top" alt="capa do curso" style="height: 250px; width: 400px;"> -->
                    <video width="320" height="240" class="img-fluid" poster="<?= BASE ?>/assets/images/backstage_data.png" style="border-radius: 8px;" controls>
                        <source src="<?= BASE ?>/assets/video/humberto.mp4" type="video/mp4">
                    </video>
                    <h6 class="m-0 font-weight-bold text-sm-primary mt-2">Pré-visualização do curso</h6>
                </div>
                <div class="py-3 d-flex flex-column align-items-start">
                    <h6 class="m-0 font-weight-bold text-sm-dark">R$30,00</h6>
                    <span>Descrições do curso</span>
                </div>
                <div class="d-flex flex-column">
                    <a href="<?= BASE ?>/painel/profile/courses/compra-curso" class="btn btn-danger text-sm">Adicionar ao carrinho</a>
                    <a href="<?= BASE ?>/painel/profile/courses/compra-curso" class="btn btn-outline-danger text-sm mt-3">Comprar agora</a>
                </div>
            </div>
        </div>


    </div>
        
        



    <div class="card-body flex-column align-items-start bg-light rounded mt-4">
        <h5 class="mb-1 text-dark">O que você aprenderá:</h5>
        <ul class="mt-2">
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
            <li>Item 4</li>
            <li>Item 5</li> 
        </ul>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <h5 class="mb-1 mt-5">Conteúdo do curso:</h5>    
        <div class="d-flex flex-row">
            <p class="ml-auto p-2" style="font-size: 12px;">Número de Módulos</p>
            <p class="p-2" style="font-size: 12px;">Total de aulas</p>
            <p class="p-2" style="font-size: 12px;">Total de horas do curso</p>
        </div>
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

<!-- Fim do container -->
</div>
<?= $Component->getFooterDashboard(); ?>