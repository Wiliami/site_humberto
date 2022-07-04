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
$courseId = filter_input(INPUT_GET, 'delete_curso', FILTER_VALIDATE_INT);
?>

<div class="container">
    <?php
    $Read = new Read();
    $Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$courseId}");
    if($Read->getResult()) {
        $DataCourse = $Read->getResult()[0];
    } else {
        Error("Curso não encontrado!", 'danger')
        ?>
    <a href="<?= BASE ?>/painel/courses/list" class="btn btn-outline-success" title="Voltar para a lista de cursos">Voltar</a>    
    <?php
    die(); 
    }
    ?>

    <div class="card shadow">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-start">
            <h6 class="h5 mb-0 text-gray-800">Excluir <b><?= $DataCourse['curso_titulo'] ?></b></h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['delete_course'])) {
                    $Course = new Course();
                    $Course->deleteCourse($courseId);
                    if($Course->getResult()) {
                        Error($Course->getError());
                        header('Location: ' . BASE . '/painel/courses/list');
                    } else {
                        Error($Course->getError(), 'warning');
                    }
                } 
                ?>
               
                <a href="<?= BASE ?>/painel/courses/list" class="btn btn-outline-success mb-2" title="Voltar para lista de cursos">Voltar</a>
                <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModal">
                    Excluir
                </button>


                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Excluir <b><?= $DataCourse['curso_titulo']; ?></b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">    
                                Tem certeza que deseja excluir curso?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-success" type="button" data-dismiss="modal">
                                    Cancelar
                                </button>
                                <input type="submit" class="btn btn-danger" name="delete_course" value="Excluir">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> 
</div>
<?= $Component->getFooterDashboard(); ?>