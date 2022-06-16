<?php 
$Read = new Read();
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
$courseId = filter_input(INPUT_GET, 'update_curso', FILTER_VALIDATE_INT);
$CreateMsg = filter_input(INPUT_GET, 'create', FILTER_VALIDATE_BOOL);
?>  
<div class="container">
    <?php
    if($CreateMsg) {
        Error("Curso cadastrado com sucesso!", 'success');
    }
    $Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$courseId}");
    if($Read->getResult()) {
        $DataCourse = $Read->getResult()[0];
    } else {
        Error("Curso não encontrado!", 'warning');
            ?>
        <a href="<?= BASE ?>/painel/courses/list" class="btn btn-outline-success" title="Voltar para a lista de cursos">Voltar</a>
    <?php
        die();
    }   
    ?>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h1 class="h2 m-0 text-gray-800" style="font-size: 14px;">Atualizar <?= $DataCourse['curso_titulo'] ?></h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <?php
                        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                        if(!empty($Post['update_course'])) {
                            $updateCourse['curso_titulo'] = (!empty($Post['course']) ? $Post['course'] : null);
                            $updateCourse['curso_descricao'] = (!empty($Post['description']) ? $Post['description'] : null);
                            $updateCourse['curso_valor'] = (!empty($Post['valor']) ? $Post['valor'] : null);
                            $DataCourse = $updateCourse;
                            $Course = new Course();
                            $Course->updateCourse($updateCourse, $courseId);
                            if($Course->getResult()) {
                                Error($Course->getError());
                            } else {
                                Error($Course->getError(), 'warning');
                            }   
                        }
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Curso</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome do curso"  name="course" value="<?= $DataCourse['curso_titulo'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Descrição</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Descrição do curso" name="description" value="<?= $DataCourse['curso_descricao'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Valor</label>
                            <input type="number" step="0.01" class="form-control" id="exampleInputPassword2" placeholder="Valor do curso" name="valor" value="<?= $DataCourse['curso_valor'] ?>">
                        </div>
                        <a href="<?= BASE ?>/painel/courses/list" class="btn btn-outline-success" title="Voltar para a lista de cursos">Voltar</a>
                        <input type="submit" class="btn btn-success" name="update_course" value="Atualizar">
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 text-gray-800" style="font-size: 14px;">Capa do curso</h6>
                </div>
                <div class="card-body">
                    <?php
                    if($DataCourse['curso_img']) {
                        ?>
                        <img style="width: 200; height: 200px;" class="img-thumbnail" src="<?= BASE ?>/uploads/<?= $DataCourse['curso_img']; ?>" />
                        <?php
                    } else {
                        die(Error('Imagem não encontrada', 'warning'));
                    }
                    ?>   
                </div>
            </div>
        </div>


    </div>
</div>

<?= $Component->getFooterDashboard(); ?>