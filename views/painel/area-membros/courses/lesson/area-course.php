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
        <div class="col">
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
        <div class="col-7">
            <div id="accordion" class="mt-4">
                <div class="card">
                    <?php
                    $Read->FullRead("SELECT * FROM modulos WHERE curso_id = :ci", "ci={$courseId}");
                    if($Read->getResult()) {
                        foreach($Read->getResult() as $DataModule) {
                            ?>
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <a href="" class="nav-link collapsed text-dark" data-toggle="collapse" data-target="#collapse<?= $DataModule['modulo_id'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                <?= $DataModule['modulo_name'] ?>
                            </a>
                        </h5>
                    </div>
                    <?php }
                    } else {
                        die(Error('Curso não encontrado!', 'danger'));
                    }
                    ?>
                    <div id="collapse<?= $DataModule['modulo_id'] ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <?php
                            $Read->FullRead("SELECT * FROM aulas WHERE modulo_id = :mi", "mi={$DataModule['modulo_id']}");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $DataLesson) {
                                    ?>
                            <i class="fas fa-play-circle"></i>
                            <!-- Nome da aula -->
                                <?= $DataLesson['aula_name'] ?>
                            <?php               
                                }
                            } else {
                                die(Error('Aula não encontrada!', 'danger'));
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
            <h4 class="text-white">Collapsed content</h4>
            <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>

    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
            <h4 class="text-white">Collapsed content</h4>
            <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>

    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
            <h4 class="text-white">Collapsed content</h4>
            <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
</div>


<!-- <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <?php
                    $Read->FullRead("SELECT mc.*, c.curso_titulo, c.curso_descricao
                        FROM matriculas_cursos mc
                        LEFT JOIN cursos c ON c.curso_id = mc.curso_id
                        WHERE mc.curso_id = :ci", "ci={$courseId}");
                    if($Read->getResult()) {
                        $DataCourse = $Read->getResult()[0];
                            ?>
                    <h6 class="h4 m-0 font-weight-bold text-dark text-start"><?= $DataCourse['curso_titulo'] ?></h6>
                        <?php
                    } else {
                        die(Error('Curso não encontrado!', 'success'));
                    }
                    ?>
                </div>
                <div class="card-body">
                <?php
                $Read->FullRead("SELECT * FROM modulos WHERE curso_id = :ci", "ci={$courseId}");
                if($Read->getResult()) {
                    foreach($Read->getResult() as $DataModule) {
                        ?>
                    <li class="nav-item" style="list-style: none;">
                        <a class="nav-link collapsed text-dark" href="#" data-toggle="collapse" data-target="#collapse<?= $DataModule['modulo_id'] ?>" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-solid fa-angle-right"></i>
                            <span><?= $DataModule['modulo_name'] ?></span>
                        </a>
                        <div id="collapse<?= $DataModule['modulo_id'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <?php
                                $Read->FullRead("SELECT * FROM aulas WHERE modulo_id = :mi", "mi={$DataModule['modulo_id']}");
                                if($Read->getResult()) {
                                    foreach($Read->getResult() as $Lesson) {
                                        ?>
                                    <div class="d-flex flex-column">
                                        <a class="collapse-item btn btn-light mt-2" href="<?= BASE ?>/painel/profile/courses/lesson/details&a=<?= $Lesson['aula_id'] ?>&course=<?= $DataCourse['curso_id'] ?>"><?= $Lesson['aula_name'] ?></a>
                                    </div>
                                <?php               
                                    }
                                } else {
                                    Error('Aula não encontrada!', 'success');
                                }
                                ?>
                            </div>
                        </div>  
                    </li>
                <?php
                        }
                } else {
                    Error('Módulos não encontrados', 'success');
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div> -->





<div class="container">
    <div class="pos-f-t">
        <?php
        $Read->FullRead("SELECT * FROM modulos WHERE curso_id = :ci", "ci={$courseId}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $DataModule) {
                ?>
        <nav class="navbar navbar-dark bg-dark">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <div class="" type="text" data-toggle="collapse" data-target="#collapse<?= $DataModule['modulo_id'] ?>" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <h4 class="text-white"><?= $DataModule['modulo_name'] ?></h4>
            </div>
        </nav>
        <div class="collapse" id="collapse<?= $DataModule['modulo_id'] ?>">
            <div class="bg-dark p-4">
                <?php
                $Read->FullRead("SELECT * FROM aulas WHERE modulo_id = :mi", "mi={$DataModule['modulo_id']}");
                if($Read->getResult()) {
                    foreach($Read->getResult() as $DataLesson) {
                        ?>
                <i class="fas fa-play-circle"></i>
                <a href="" class="text-muted"><?= $DataLesson['aula_name'] ?></a>
                <?php               
                    }
                } else {
                    die(Error('Aula não encontrada!', 'danger'));
                }
                ?>
            </div>
        </div>
        <?php
            }
        } else {
            die(Error('Módulos não encontrados', 'danger'));
        }
        ?>
    </div>
</div>

<!-- O id se conecta com o data-target da tag  -->
 <?= $Component->getFooterDashboard(); ?>