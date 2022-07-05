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
$Read = new Read();
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h5 mb-0 text-gray-800">Matrícula de curso</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['create_matriculate'])) {
                    $matriculateCourse['curso_id'] = $Post['matriculate_course'];
                    $matriculateCourse['user_id'] = $Post['matriculate_user'];
                    $Course = new Course();
                    $Course->matriculateCreateCourse($matriculateCourse);
                    if($Course->getResult()) {
                        Error($Course->getResult());
                        header('Location: ' . BASE . '/painel/profile/courses/list');
                        die(); 
                    } else {
                        Error($Course->getError(), 'danger');
                    }
                }
                ?>
                <div class="form-group">         
                    <label for="exampleInputEmail1">Curso</label>
                    <select class="form-control" name="matriculate_course" value="<?= isset($Post['matriculate_course'])? $Post['matriculate_course']: '' ?>">
                        <?php
                        $Read->FullRead("SELECT * FROM cursos");
                        if($Read->getResult()) {
                            echo "<option value=''>selecionar</option>";
                            foreach($Read->getResult() as $Read) {
                                echo "<option value='{$DataCourse['curso_id']}'>{$DataCourse['curso_titulo']}</option>";
                            }
                        } else {    
                            echo "<option value=''>Cursos não encontrados!</option>";
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
                            echo "<option value=''>selecionar</option>";
                            foreach($Read->getResult() as $DataUser) {
                                echo "<option value='{$DataUser['user_id']}'>{$DataUserUser['user_name']}</option>";
                            }
                        } else {    
                            echo "<option value=''>Usuário não encontrado!</option>";
                        }
                        ?>
                    </select>   
                </div>
                <a href="<?= BASE ?>/painel/admin/matriculas/cursos/list" class="btn btn-outline-success mb-2" title="Voltar para lista de matrículas de cursos">Voltar</a>
                <input type="submit" class="btn btn-success mb-2" name="create_matriculate" value="Matricular">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>