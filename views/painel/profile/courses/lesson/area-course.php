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
$Username = $_SESSION['login']['user_name'];
$courseId = filter_input(INPUT_GET, 'course', FILTER_VALIDATE_INT);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <?php
                    $Read = new Read();
                    $Read->FullRead("SELECT mc.*, c.curso_titulo, c.curso_descricao
                    FROM matriculas_cursos mc
                    LEFT JOIN cursos c ON c.curso_id = mc.curso_id
                    WHERE mc.curso_id = :ci", "ci={$courseId}");
                    if($Read->getResult()) {
                        $DataCourse = $Read->getResult()[0];
                            ?>
                    <h6 class="h4 m-0 font-weight-bold text-dark text-center"><?= $DataCourse['curso_titulo'] ?></h6>
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
                    foreach($Read->getResult() as $Modules) {
                        ?>
                    <li class="nav-item" style="list-style: none;">
                        <a class="nav-link collapsed text-dark" href="#" data-toggle="collapse" data-target="#collapse<?= $Modules['modulo_id'] ?>" aria-expanded="true"
                            aria-controls="collapseTwo">
                            <i class="fas fa-solid fa-angle-right"></i>
                            <span><?= $Modules['modulo_name'] ?></span>
                        </a>
                       
                        <div id="collapse<?= $Modules['modulo_id'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <?php
                                $Read->FullRead("SELECT * FROM aulas WHERE modulo_id = :mi", "mi={$Modules['modulo_id']}");
                                if($Read->getResult()) {
                                    foreach($Read->getResult() as $Lesson) {
                                        ?>
                                    <div class="d-flex flex-column">
                                        <a class="collapse-item btn btn-success mt-2" href="<?= BASE ?>/painel/profile/courses/lesson/details&a=<?= $Lesson['aula_id'] ?>&course=<?= $DataCourse['curso_id'] ?>"><?= $Lesson['aula_name'] ?></a>
                                    </div>
                                <?php               
                                    }
                                } else {
                                    Error('Aula não encontrada!', 'btn btn-success');
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
</div>
<script type="text/javascript">
    $(function() {
        $('#form1').submit(function(e) {
            e.preventDefault();

            var comment = $('#comment').val();
        
            $.ajax({
                url: '<?= BASE ?>/api?route=comments&action=create',
                type: 'POST',
                data: { comment: comment, action: 'add_comment'},
                dataType: 'json',
                }).done(function(result) {
                    console.log(result);
                }).fail(function(data) {
                    console.log(data);
                });
            return false;
        });
    });
</script>
 <?= $Component->getFooterDashboard(); ?>