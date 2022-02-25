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
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800">Matrículas de cursos</h1>
    </div>
    <form method="post">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['register_matriculate'])) {
            $MatriculateCourse['matricula_curso'] = $Post['matriculate_course'];
            $MatriculateCourse['matricula_curso_usuario'] = $Post['matriculate_user_course'];
            $Course = new Course();
            $Course->matriculateCourse($MatriculateCourse);
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
            $Read->FullRead("SELECT c.*, u.user_name
                FROM cursos c
                LEFT JOIN users u ON u.user_id = c.user_id");
                if($Read->getResult()) {
                    echo "<option value=''>selecionar</option>";
                    foreach($Read->getResult() as $Cursos) {
                        echo "<option value='{$Cursos['curso_id']}'>{$Cursos['curso_titulo']}</option>";
                            ?> 
            </select>    
            <label for="exampleInputEmail1">Escolher usuário</label>
            <select class="form-control" name="matriculate_user_course" value="<?= isset($Post['matriculate_user_course'])? $Post['matriculate_user_course']: '' ?>">
            <?php
                        echo "<option value=''>selecionar</option>";
                        foreach($Read->getResult() as $Users) {
                            echo "<option value='{$Users['user_id']}'>{$Users['user_name']}</option>";
                        } 
                    }
                } else {
                    echo "<option value=''>Não existe lista de cursos ou usuários!</option>";
                }
            ?>
            </select>
        </div>
        <input type="submit" class="btn btn-success mb-2" name="register_matriculate_course" value="Matricular">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>