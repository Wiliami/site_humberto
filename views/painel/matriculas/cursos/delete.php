<?php 
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
$MatriculaId = filter_input(INPUT_GET, 'delete_matricula', FILTER_VALIDATE_INT);
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h5 mb-0 text-gray-800">Excluir matrícula</h1>
        </div>
        <div class="card-body">
            <?php
            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(!empty($Post['delete_matricula'])) {
                $Course = new Course();
                $Course->deleteMatriculateCourse($MatriculaId);
                if($Course->getResult()) {
                    Error($Course->getError());
                } else {
                    Error($Course->getError(), 'warning');
                }
            }
            ?>
            <form action="" method="post">
                <?php 
                $Read = new Read();
                $Read->FullRead("SELECT mc.*, u.user_name, c.curso_titulo 
                    FROM matriculas_cursos mc
                    LEFT JOIN cursos c ON c.curso_id = mc.curso_id
                    LEFT JOIN users u ON u.user_id = mc.user_id
                    WHERE matricula_id = :mi", "mi={$MatriculaId}");
                if($Read->getResult()) {
                    foreach($Read->getResult() as $Mat) {
                        ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1">Curso</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="matriculate_course" value="<?= $Mat['curso_titulo'] ?>">
                </div> 
                <div class="mb-3">
                    <label for="exampleInputEmail1">Usuário</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="matriculate_user" value="<?= $Mat['user_name'] ?>">
                </div> 
                <?php
                    }
                }
                ?>
                <a href="<?= BASE ?>/painel/matriculas/cursos/list" class="btn btn-outline-success" title="Voltar para lista de matrículas">Voltar</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    Excluir
                </button>
                
                 <!-- Modal -->
                 <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Excluir matrícula de <b><?= $Mat['user_name']; ?>?</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja excluir matrícula do usuário?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-success mb-2" type="button" data-dismiss="modal">
                                    Cancelar
                                </button>
                                <input type="submit" class="btn btn-danger mb-2" name="delete_matricula" value="Excluir">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard ();?>