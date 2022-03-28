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
$matriculaId = filter_input(INPUT_GET, 'matricula_update', FILTER_VALIDATE_INT);

$Read = new Read();
$Read->FullRead("SELECT mc.*, u.user_name, c.curso_titulo
    FROM matriculas_cursos mc
    LEFT JOIN users u ON u.user_id = mc.user_id
    LEFT JOIN cursos c ON c.curso_id = mc.curso_id
    WHERE matricula_id = :mi", "mi={$matriculaId}");
        if($Read->getResult()) { 
            $DataMatricula = $Read->getResult()[0];
        } else {
            die(Error("Mátricula não encontrada!", 'warning'));
        }
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h1 class="h5 mb-0 text-gray-800">Atualizar matrícula de <b><?= $DataMatricula['user_name'] ?></b></h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php 
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['update_matriculate'])) {
                    $updateMatriculateCourse['curso_id'] = (!empty($Post['course'])? $Post['course']: null);
                    $Course = new Course();
                    $Course->matriculateUpdateCourse($updateMatriculateCourse, $matriculaId);
                    if($Course->getResult()) {
                        Error($Course->getError());
                    } else {
                        Error($Course->getError(), 'warning');
                    }
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Curso</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome do curso"  name="course" value="<?= $DataMatricula['curso_titulo'] ?>">
                </div>
                <a href="<?= BASE ?>/painel/matriculas/cursos/list" class="btn btn-outline-success" title="Voltar para lista de matrículas">Voltar</a>
                <input type="submit" class="btn btn-success" name="update_matriculate" value="Atualizar">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>