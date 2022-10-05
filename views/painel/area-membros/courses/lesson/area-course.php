<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
$courseId = filter_input(INPUT_GET, 'course', FILTER_VALIDATE_INT);
$Read = new Read();
?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card-body">
                <?php
                $Read->FullRead("SELECT mc.*, c.curso_titulo, c.curso_descricao
                    FROM matriculas_cursos mc
                    LEFT JOIN cursos c ON c.curso_id = mc.curso_id
                    WHERE mc.curso_id = :ci", "ci={$courseId}");
                if($Read->getResult()) {
                    $DataCourse = $Read->getResult()[0];
                        ?>
                <h5 class="card-title text-dark"><?= $DataCourse['curso_titulo'] ?></h5>
                <p class="card-text"><?= $DataCourse['curso_descricao'] ?></p>
                <?php
                } else {
                    die(Error('Curso não encontrado!', 'danger'));
                }
                ?>
                <small>1h 3m</small>
                •
                <small>23 conteúdos</small>
            </div>
        </div>

        <div class="col"> 
            <div class="accordion" id="accordionExample">
                <div class="card">
                <?php
                $Read->FullRead("SELECT * FROM modulos WHERE curso_id = :ci", "ci={$courseId}");
                if($Read->getResult()) {
                    foreach($Read->getResult() as $DataModule) {
                        ?>
                    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapse<?= $DataModule['modulo_id'] ?>" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="mb-0"><?= $DataModule['modulo_name'] ?></h5>
                    </div>

                    <div id="collapse<?= $DataModule['modulo_id'] ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                        <?php
                        $Read->FullRead("SELECT * FROM aulas WHERE modulo_id = :mi", "mi={$DataModule['modulo_id']}");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $DataLesson) {
                                ?>
                            <i class="fas fa-play-circle"></i>
                            <a href="<?= BASE ?>/painel/area-membros/courses/lesson/details&a=<?= $DataLesson['aula_id'] ?>" class="text-dark"><?= $DataLesson['aula_name'] ?></a><br>
                        <?php               
                            }
                        } else {
                            Error('Aula não encontrada!', 'danger');
                        }
                        ?>
                        </div>
                    </div>
                    <?php }
                } else {
                    Error('Módulo não encontrado!', 'danger');
                }
                ?>
                </div>
               
            </div>



            <!-- Código html recente !-->
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Accordion Item #1
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Accordion Item #2
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Accordion Item #3
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                    </div>
                </div>
            </div>

            <!-- Fim do código recente -->
        </div>
    </div>
</div>
<!-- O id se conecta com o data-target da tag  -->



 <?= $Component->getFooterDashboard(); ?>