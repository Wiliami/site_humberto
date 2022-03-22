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
            <h1 class="h5 mb-0 text-gray-800">Cadastro de aulas</h1>
        </div>
        <div class="card-body"> 
            <form method="post">
                <?php
                    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    if(!empty($Post['create_lesson'])) {
                        $CreateLesson['curso_titulo'] = $Post['course'];
                        $CreateLesson['modulo_name'] = $Post['module'];
                        $CreateLesson['aula_name'] = $Post['lesson'];
                        $CreateLesson['aula_duracao'] = $Post['time'];
                        $CreateLesson['aula_url'] = $Post['url'];
                        $Course = new Course();
                        $Course->createLesson($CreateLesson);
                        if($Course->getResult()) {
                            Error($Course->getError());
                        } else {
                            Error($Course->getError(), 'warning');
                        } 
                    }
                    ?>
                    <div class="form-group">
                    <label for="inputPassword">Selecionar curso</label>
                        <select class="form-control" name="course" 
                            value="<?= isset($Post['curso_titulo'])? $Post['curso_titulo']: '' ?>">
                            <?php
                            $Read = new Read();
                            $Read->FullRead("SELECT * FROM cursos");
                            if($Read->getResult()) {
                                echo "<option value=''>Selecionar</option>";
                                foreach($Read->getResult() as $Cursos)
                                    echo "<option value='{$Cursos['curso_id']}'>{$Cursos['curso_titulo']}</option>";
                            } else {
                                echo "<option value=''>Nenhum curso cadastrado!</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Selecionar módulo</label>
                            <select class="form-control" name="module"
                                value="<?= isset($Post['modulo_name'])? $Post['modulo_name']: '' ?>">
                                <?php
                                $Read->FullRead('SELECT * FROM modulos');
                                if($Read->getResult()) {
                                    echo "<option value=''>Selecionar</option>";
                                    foreach($Read->getResult() as $Modulos) {
                                        echo "<option value='{$Modulos['modulo_id']}'>{$Modulos['modulo_name']}</option>";
                                    }
                                } else {
                                    echo "<option value=''>Ainda não existem módulos!</option>";
                                }
                                ?>
                            </select> 
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Aula</label>
                            <input type="text" class="form-control" placeholder="Nome da aula" name="lesson" id="inputPassword"
                                value="<?= isset($Post['lesson'])? $Post['lesson']: '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Duração</label>
                            <input type="text" class="form-control" placeholder="Duração da aula" name="time" id="inputPassword"
                                value="<?= isset($Post['time'])? $Post['time']: '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">URL</label>
                            <input type="text" class="form-control" placeholder="URL da aula" name="url" id="inputPassword"
                                value="<?= isset($Post['url'])? $Post['url']: '' ?>">
                    </div>
                    <a href="<?= BASE ?>/painel/courses/lesson/list" class="btn btn-outline-success mb-2" title="Voltar para lista de categorias">Voltar</a>
                    <input type="submit" class="btn btn-success mb-2" name="create_lesson" value="Cadastrar">
                </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>