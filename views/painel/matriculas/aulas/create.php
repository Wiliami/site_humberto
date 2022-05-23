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
            <h1 class="h5 mb-0 text-gray-800">Matrícula na aula</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['create_matriculate'])) {
                    $MatriculateCourse['aula_id'] = $Post['lesson'];
                    $MatriculateCourse['user_id'] = $Post['user'];
                    $Course = new Course();
                    $Course->matriculateCreateLesson($MatriculateCourse);
                    if($Course->getResult()) {
                        Error($Course->getResult());
                    } else {
                        Error($Course->getError(), 'danger');
                    }
                }
                ?>
                <div class="form-group">         
                    <label for="exampleInputEmail1">Aula</label>
                    <select class="form-control" name="lesson" value="<?= isset($Post['lesson'])? $Post['lesson']: '' ?>">
                        <?php
                        $Read->FullRead("SELECT * FROM aulas");
                        if($Read->getResult()) {
                            echo "<option value=''>selecionar</option>";
                            foreach($Read->getResult() as $Aulas) {
                                echo "<option value='{$Aulas['aula_id']}'>{$Aulas['aula_name']}</option>";
                            }
                        } else {
                            echo "<option value=''>Aulas não encontradas!</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">         
                    <label for="exampleInputEmail1">Usuário</label>
                    <select class="form-control" name="user" value="<?= isset($Post['user'])? $Post['user']: '' ?>">
                        <?php
                        $Read->FullRead("SELECT * FROM users");
                        if($Read->getResult()) {
                            echo "<option value=''>selecionar</option>";
                            foreach($Read->getResult() as $Users) {
                                echo "<option value='{$Users['user_id']}'>{$Users['user_name']}</option>";
                            }
                        } else {
                            echo "<option value=''>Cursos não encontrados!</option>";
                        }
                        ?>
                    </select>
                </div>
                <a href="<?= BASE ?>/painel/matriculas/aulas/list" class="btn btn-outline-success mb-2" title="Voltar para lista de matrículas de aulas">Voltar</a>
                <input type="submit" class="btn btn-success mb-2" name="create_matriculate" value="Matricular">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>