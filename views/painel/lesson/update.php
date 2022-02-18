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
echo $Component->getMenuDashboard();
$AulaId = $_GET['aula'];
?>
<div class="container">
    <div class="py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800 ml-4">Atualizar aulas</h1>
        <a href="<?= BASE ?>/painel/lesson/list" class="btn btn-success mb-2" title="Voltar para lista de aulas">Voltar</a>
    </div>
    <form method="post">
        <div class="px-4 py-sm-5 py-3">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['update_lesson'])) {
            $updateLesson['aula_name'] = $Post['lesson'];
            $updateLesson['aula_duracao'] = $Post['time'];
            $updateLesson['aula_url'] = $Post['url'];
            $Course = new Course();
            $Course->updateLesson($updateLesson);
            if($Course->getResult()) {
                //header('Location: ' . BASE . '/painel/courses/update');
                Error($Course->getError());
            } else {
                Error($Course->getError(), 'warning');
                //falta os campos serem preenchidos nos inputs ou o input recebeu alguma informação errada
            }   
        }
        ?>
        </div>
        <?php 
        $Read = new Read();
        $Read->FullRead("SELECT * FROM aulas WHERE aula_id = :ai", "ai={$AulaId}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Aula) {
                ?>
        <h1 class="h5 mb-0 text-gray-800 ml-4 mb-4">Atualizar <?= $Aula['aula_name'] ?></h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Aula</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome da aula" value="<?= $Aula['aula_name'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Duração</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Duração da aula">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <input type="submit" class="btn btn-primary" name="update_lesson" value="Atualizar aula">
        </form>





        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nome da aula" name="lesson" id="inputPassword"
                    value="<?= $Aula['aula_name'] ?>"> 
            </div>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Duração</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Duração da aula" name="time" id="inputPassword" 
                    value="<?= $Aula['aula_duracao'] ?>">
            </div>
        </div>
        <div class="form-group row ml-4">
            <label for="categoria" class="col-sm-1 col-form-label btn btn-warning mb-2">URL</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="URL da aula" name="url" id="inputPassword" 
                    value="<?= $Aula['aula_url'] ?>">
            </div>
        </div>
        <?php
            }
        }
        ?>
        <div class="px-4 py-sm-5 py-3">
        </div>
        <input type="submit" class="btn btn-success mb-2 ml-4" name="update_lesson" value="Finalizar atualizações">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>