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
                    <h6 class="m-0 font-weight-bold text-dark text-center"><?= $DataCourse['curso_titulo'] ?></h6>
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
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $Modules['modulo_id'] ?>" aria-expanded="true"
                            aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-folder"></i>
                            <span><?= $Modules['modulo_name'] ?></span>
                        </a>
                        <div id="collapse<?= $Modules['modulo_id'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            $Read->FullRead("SELECT * FROM aulas WHERE modulo_id = :mi", "mi={$Modules['modulo_id']}");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Lesson) {
                                    ?>
                                <a class="collapse-item btn btn-light" href="<?= BASE ?>/painel/profile/courses/lesson/details&a=<?= $Lesson['aula_id'] ?>&course=<?= $DataCourse['curso_id'] ?>"><?= $Lesson['aula_name'] ?></a>
                                <?php               
                                    }
                                } else {
                                    Error('Aula não encontrada!', 'light');
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
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Unitplus <?= date('Y') ?></span>
        </div>
    </div>
</footer>        

        <!-- Logout Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title btn btn-success mb-2 vw-100" id="exampleModalLabel">Pronto para sair?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecione "Sair" para encerrar a sua sessão.</div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-dark" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-success" href="<?= BASE ?>/pages/logout">Sair</a>
                    </div>
                </div>
            </div>      
        </div>


        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

        <!-- <script src="<?= BASE ?>/res/site/js/jquery.min.js"></script> -->
        <script src="<?= BASE ?>/res/site/js/bootstrap.bundle.min.js"></script>
        <script src="<?= BASE ?>/res/site/js/jquery.easing.min.js"></script>
        <script src="<?= BASE ?>/res/site/js/sb-admin-2.min.js"></script>

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
    </body>
</html>