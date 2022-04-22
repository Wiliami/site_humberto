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

// $Read = new Read();
// $Read->FullRead('SELECT * FROM aulas WHERE au    la_id = :ai', "ai={$aulaId}");
// if($Read->getResult()) {
//     $DataLesson = $Read->getResult()[0];
// } else {
//     die(Error('Aula não encontrada!', 'warning'));
// }
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
                    <h6 class="m-0 font-weight-bold text-primary"><?= $DataCourse['curso_titulo'] ?></h6>
                    <?php
                } else {
                    die(Error('Curso não encontrado!', 'warning'));
                }
                ?>

                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <?php
                            $Read->FullRead("SELECT * FROM modulos WHERE curso_id = :ci", "ci={$courseId}");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Modules) {
                                    ?>
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $Modules['modulo_id'] ?>" aria-expanded="true" aria-controls="collapseOne"> 
                                    <?= $Modules['modulo_name'] ?>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">Nome da aula</div>
                            </div>
                            <?php
                                }
                            } else {
                                Error('Módulos não encontrados', 'warning');
                            }
                            ?>
                        </div>
                    </div>
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