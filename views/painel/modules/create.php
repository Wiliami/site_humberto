<?php 
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
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
        <h1 class="h3 mb-0 text-gray-800 ml-4">Cadastro de módulos</h1>
    </div>
    <p class="ml-4">Cadastrar módulos em um curso</p>
    <form method="post">
        <div class="px-4 py-sm-5 py-3">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['register_module'])) {
            $CreateModule['modulo_name'] = $Post['module'];
            $CreateModule['modulo_descricao'] = $Post['description'];
            $Course = new Course();
            $Course->createModule($CreateModule);
            if($Course->getResult()) {
                header('Location: ' . BASE . '/painel/aulas');
                Error($Course->getError());
                // cadastro realizado com sucesso
            } else {
                Error($Course->getError(), 'warning');
                //falta os campos serem preenchidos nos inputs ou o input recebeu alguma informação errada
            }   
        }
        ?>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Curso</label>
            <div class="col-sm-10">
                <select class="form-control" id="" name="module">
                    <?php 
                    $Read = new Read();
                    $Read->FullRead('SELECT * FROM cursos');
                    if($Read->getResult()) {
                        foreach($Read->getResult() as $Cursos) {
                            echo "<option value='{$Cursos['curso_id']}'>{$Cursos['curso_titulo']}</option>";
                        }
                    } else {
                        echo "<option value=''>Ainda não existem curso!</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Módulo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nome do módulo" name="module" id="inputPassword"
                    value="<?= isset($Post['module'])? $Post['module']: '' ?>">
            </div>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Descrição</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Descrição do módulo" name="description"
                    id="inputPassword" value="<?= isset($Post['description'])? $Post['description']: '' ?>">
            </div>
        </div>
        <input type="submit" class="btn btn-success mb-2 ml-4" name="register_module" value="Cadastrar módulo">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>