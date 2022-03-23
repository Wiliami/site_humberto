<?php 
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h5 mb-0 text-gray-800">Matrícula de curso</h1>
        </div>
        <div class="card-body">
            <form method="post">
                <?php
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['create_matriculate'])) {
                    $matriculateUser['curso_id'] = $Post['matriculate_course'];
                    $matriculateUser['user_id'] = $Post['matriculate_user'];
                    $Course = new Course();
                    $Course->matriculateCreateCourse($matriculateUser);
                    if($Course->getResult()) {
                        Error($Course->getResult());    
                    } else {
                        Error($Course->getError(), 'warning');
                    }
                }
                ?>
                <div class="form-group">         
                    <label for="exampleInputEmail1">Curso</label>
                    <select class="form-control" name="matriculate_course" value="<?= isset($Post['matriculate_course'])? $Post['matriculate_course']: '' ?>">
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM cursos");
                        if($Read->getResult()) {
                            echo "<option value=''>Selecionar</option>";
                            foreach($Read->getResult() as $Cursos) {
                                echo "<option value='{$Cursos['curso_id']}'>{$Cursos['curso_titulo']}</option>";
                            }
                        } else {
                            echo "<option value=''>Não existe lista cursos!</option>";
                        }
                        ?>
                    </select>   
                </div>
                <div class="form-group">          
                    <label for="exampleInputEmail1">Usuário</label>            
                    <select class="form-control" name="matriculate_user" value="<?= isset($Post['matriculate_user'])? $Post['matriculate_user']: '' ?>">
                        <?php
                        $Read->FullRead("SELECT * FROM users");
                        if($Read->getResult()) {
                            echo "<option value=''>Selecionar</option>";
                            foreach($Read->getResult() as $Users) {
                                echo "<option value='{$Users['user_id']}'>{$Users['user_name']}</option>";
                            }   
                        } else {
                            echo "<option value=''>Não existe usuários!</option>";
                        }
                        ?>
                    </select>
                </div>
                <a href="<?= BASE ?>/painel/matriculas/cursos/list" class="btn btn-outline-success mb-2" title="Voltar para lista de matrículas de cursos">Voltar</a>
                <input type="submit" class="btn btn-success mb-2" name="create_matriculate" value="Matricular">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>