<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
echo $Component->getBlockPageAdmin();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
$DeleteLesson = $_GET['delete_aula'];
echo $DeleteLesson;
?>
<div class="container card-header">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h5 class="h3 mb-0 text-gray-800 ml-2">Excluir | Excluir aulas</h5>
        <a href="<?= BASE ?>/painel/lesson/list" class="btn btn-success mb-2" title="Voltar para lista de aulas">Voltar</a>
    </div>
    <form>

        <?php 
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(!empty($Post['lesson_delete'])) {
                $deleteLesson['aula_name'] = $Post['lesson'];
                $deleteLesson['aula_duracao'] = $Post['time'];
                $deleteLesson['aula_url'] = $Post['url'];
                $Course = new Course();
                $Course->deleteLesson($deleteLesson);
                if($Course->getResult()) {
                    Error($Course->getError());
                } else {
                    Error($Course->getError(), 'warning');
                }
            }
        ?>
        <div class="px-4 py-sm-5 py-3">
            ...
        </div>
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM aulas WHERE aula_id = :ai", "ai={$DeleteLesson}");
            if($Read->getResult()) {
                foreach($Read->getResult() as $Aulas) {
                    Check::var_dump_json($Read->getResult())
                    ?>
        <h1 class="h5 mb-0 text-gray-800 ml-4 mb-4">Excluir <?= $Aulas['aula_name'] ?></h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Aula</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da aula" name="lesson" value="<?= $Aulas['aula_name'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Duração da aula</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Duração da aula" name="time" value="<?= $Aulas['aula_duracao'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">URL</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="URL da aula" name="url" value="<?= $Aulas['aula_url'] ?>">
        </div>
        <input type="submit" class="btn btn-success mb-2 ml-4" name="lesson_delete" value="Excluir aula">
    </form>
    <?php
        }
    } else {
        Error("Nenhum curso foi selecionado para deletar!");
    }
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>