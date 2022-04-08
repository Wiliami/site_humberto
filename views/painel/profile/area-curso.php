<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlHome(); 
$courseId = filter_input(INPUT_GET, 'curso', FILTER_VALIDATE_INT);
?>
        <header class="bg-dark py-5">
            <div class="overlay"></div>
            <div class="container h-100">
                <div class="d-flex align-items-center justify-content-start">
                    <p class="ml-0" style="font-size: 12px;">Categoria do curso do curso</p>
                    <p class="ml-4" style="font-size: 12px;">Categoria</p>
                </div>
                <div class="d-flex h-100 text-center align-items-center justify-content-between">
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
                    <div>
                        <img src="<?= BASE ?>/src/images/page-youtube1.jpg" class="rounded-top" alt="capa do curso" style="height: 250px; width: 400px;">
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-start">
                    <p class="" style="font-size: 12px;">Atualização do curso</p>
                    <p class="ml-4" style="font-size: 12px;">Linguaguem do curso</p>
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
            <div class="d-flex align-items-center justify-content-start">
                <p class="" style="font-size: 12px;">Número de Módulos</p>
                <p class="ml-2" style="font-size: 12px;">Total de aulas</p>
                <p class="ml-2" style="font-size: 12px;">Total de horas do curso</p>
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
       
