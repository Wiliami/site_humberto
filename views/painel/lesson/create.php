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
        <h1 class="h3 mb-0 text-gray-800 ml-4">Cadastro de aulas</h1>
    </div>
    <p class="ml-4">Cadastrar aulas em um curso</p>
    <form method="post">
        <div class="px-4 py-sm-5 py-3">
            <?php
            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(!empty($Post['register_lesson'])) {
                $CreateLesson['modulo_id'] = $Post['module'];
                $CreateLesson['aula_name'] = $Post['lesson'];
                $CreateLesson['aula_duracao'] = $Post['time'];
                $CreateLesson['aula_url'] = $Post['url'];
                //Check::var_dump_json($CreateLesson);
                $Course = new Course();
                $Course->createLesson($CreateLesson);
                if($Course->getResult()) {
                    Error($Course->getError());
                    header('Location: ' . BASE . '/painel/module/create');
                } else {
                    Error($Course->getError(), 'warning');
                } 
            }
            ?>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-2 col-form-label btn btn-warning mb-2">Módulos</label>
            <div class="col-sm-10">
                <select class="form-control" id="" name="module">
                    <?php
                    $Read = new Read();
                    $Read->FullRead('SELECT * FROM modulos');
                    if($Read->getResult()) {
                        echo "<option value=''>Selecione um módulo:</option>";
                        foreach($Read->getResult() as $Modulos) {
                            echo "<option value='{$Modulos['modulo_id']}'>{$Modulos['modulo_name']}</option>";
                        }
                    } else {
                        echo "<option value=''>Ainda não existem módulos!</option>";
                    }
                    ?>
                </select>
            </div> 
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-2 col-form-label btn btn-warning mb-2">Nome da aula</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nome da aula" name="lesson" id="inputPassword"
                        value="<?= isset($Post['lesson'])? $Post['lesson']: '' ?>">
                </div>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-2 col-form-label btn btn-warning mb-2">Duração da aula</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Duração da aula" name="time" id="inputPassword"
                    value="<?= isset($Post['time'])? $Post['time']: '' ?>">
            </div>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-2 col-form-label btn btn-warning mb-2">URL da aula</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="URL da aula" name="url" id="inputPassword"
                    value="<?= isset($Post['url'])? $Post['url']: '' ?>">
            </div>
        </div> 
        <input type="submit" class="btn btn-success mb-2 ml-4" name="register_lesson" value="Cadastrar aula">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>