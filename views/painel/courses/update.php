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
$CourseId = $_GET['curso'];
$ModuleId = 'Modulo';
$LessonId = 'Aula';
?>
<div class="container-fluid card-header">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h5 class="h3 mb-0 text-gray-800 ml-2">Atualizar cursos</h5>
        <a href="<?= BASE ?>/painel/courses/list" class="btn btn-success mb-2" title="Voltar para lista de cursos">Voltar</a>
    </div>
    <form>
        <div class="px-4 py-sm-5 py-3">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['update_course'])) {
            $udpateCourse['curso_titulo'] = $Post['course'];
            $udpateCourse['curso_descricao'] = $Post['description'];
            $update_course['curso_categoria'] = $Post['course_category'];
            $Course = new Course();
            $Course->updateCourse($udpateCourse);
            if($Course->getResult()) {
                Error($Course->getError());
            } else {
                Error($Course->getError(), 'warning');
            }   
        }
        ?>
        </div>
        <?php 
        $Read = new Read();
        $Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$CourseId}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Cursos) {
                ?>
        <h1 class="h5 mb-0 text-gray-800 ml-4 mb-4">Atualizar <?= $Cursos['curso_titulo'] ?></h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Curso</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="course" placeholder="Nome do curso" value="<?= $Cursos['curso_titulo'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Descrição do curso" name="description" value="<?= $Cursos['curso_descricao'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Categoria</label>
            <!-- <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Categoria do curso"> -->
                <select class="form-control" id="categoria" name="course_category">
                    <?php
                    $Read->ExeRead("categoria_cursos");
                    if($Read->getResult()) {
                        echo "<option value=''>Selecionar categoria:</option>";
                        foreach($Read->getResult() as $Cat) {
                            echo "<option value='{$Cat['categoria_id']}'>{$Cat['categoria_name']}</option>";
                        }
                    } else {
                        echo "<option value=''>Não existe categoria</option>";
                    }
                    ?>
                </select>
        </div>

        <div class="px-4 py-sm-5 py-3">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['update_course'])) {
            $udpateCourse['aula_name'] = $Post['lesson'];
            $udpateCourse['aula_url'] = $Post['url'];
            $udpateCourse['aula_duracao'] = $Post['time'];
            $Course = new Course();
            $Course->updateCourse($udpateCourse);
            if($Course->getResult()) {
                //header('Location: ' . BASE . '/painel/courses/update');
                Error($Course->getError());
                // cadastro realizado com sucesso
            } else {
                Error($Course->getError(), 'warning');
                //falta os campos serem preenchidos nos inputs ou o input recebeu alguma informação errada
            }
        }
        ?>
        </div>
        <div class="h5 mb-0 text-gray-800 ml-4 mb-2">Atualizar módulos e aulas</div>
        <div class="form-group">
            <label for="exampleInput">Módulo</label>
            <select name="form-control" id="exampleInput">
            <?php
            $Read->FullRead("SELECT * FROM modulos WHERE modulo_id = :mi", "mi={$ModuleId}");
            if($Read->getResult()) {
                foreach($Read->getResult() as $modules) {
                    echo "<option value='{$modules['modulo_id']}'>{$modules['modulo_name']}</option>";
                }
            } else {
                echo "<option value=''>Ainda não existem módulos</option>";
            }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="example">Aula</label>
            <input type="text" class="form-control" id="example" name="lesson" placeholder="Nome da aula" 
            value="<?= isset($Post['lesson'])? $Post['lesson']: '' ?>">
        </div>
        <div class="form-group">
            <label for="example">URL</label>
            <input type="text" class="form-control" id="example" name="url" placeholder="URL da aula" 
            value="<?= isset($Post['url'])? $Post['url']: '' ?>">
        </div>
        <div class="form-group">
            <label for="example">Duração</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="time" placeholder="Duração da aula" 
            value="<?= isset($Post['time'])? $Post['time']: '' ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="update_course" value="Atualizar curso">
    </form>
    <?php
        }
    } else {
        Error("Nenhum curso foi selecionado para atualizar!");
    }
    ?>
<!-- Fim da div container -->
</div>
<?= $Component->getFooterDashboard(); ?>