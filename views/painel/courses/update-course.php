<?php 
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
$CourseId = $_GET['cursos'];
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800 ml-4">Atualizar cursos</h1>
    </div>
    <p class="ml-4">Atualização de cursos</p>
    <form method="post">
        <div class="px-4 py-sm-5 py-3">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['update_course'])) {
            $CreateCourse['curso_titulo'] = $Post['course'];
            $CreateCourse['curso_descricao'] = $Post['description'];
            $CreateCourse['modulo_categoria'] = $Post['category'];
            $Course = new Course();
            $Course->createCourse($CreateCourse);
            if($Course->getResult()) {
                header('Location: ' . BASE . '/painel/courses/update');
                Error($Course->getError());
                // cadastro realizado com sucesso
            } else {
                Error($Course->getError(), 'warning');
                //falta os campos serem preenchidos nos inputs ou o input recebeu alguma informação errada
            }   
        }
        ?>
        </div>
        <div class="h5 mb-0 text-gray-800 ml-4 mb-2">Atualizar curso A vida Financeira</div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nome do curso" name="course" id="inputPassword"
                    value="<?= isset($Post['course'])? $Post['course']: '' ?>">
            </div>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Descrição</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Descrição do curso" name="description"
                    id="inputPassword" value="<?= isset($Post['description'])? $Post['description']: '' ?>">
            </div>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Categoria</label>
            <div class="col-sm-10">
                <!-- <input type="text" class="form-control exampleFormControlSelect1" id="exampleFormControlSelect1" placeholder="Selecione uma categoria" name="category" value="<?= isset($Post['category'])? $Post['category']: '' ?>"> -->
                <select class="form-control" id="exampleFormControlSelect1" name="category">
                    <option>Educação</option>
                    <option>Motivacional</option>
                    <option>Coaching</option>
                    <option>Economia</option>
                    <option>Casamento</option>
                    <option>Filmes e séries</option>
                    <option>Cultura</option>
                </select>
            </div>
        </div>

        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Módulo</label>
            <div class="col-sm-10">
                <select class="form-control" id="exampleFormControlSelect1" name="module">
                    <option>Educação</option>
                    <option>Motivacional</option>
                    <option>Coaching</option>
                    <option>Economia</option>
                    <option>Casamento</option>
                    <option>Filmes e séries</option>
                    <option>Cultura</option>
                </select>
            </div>
        </div>
   
        <div class="px-4 py-sm-5 py-3">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $CreateLesson['aula_name'] = $Post['lesson'];
            $CreateLesson['aula_duracao'] = $Post['time'];
            $Course = new Course();
            $Course->createLesson($CreateLesson);
            if($Course->getResult()) {
                //header('Location: ' . BASE . '/painel/courses/update');
                Error($Course->getError());
                // cadastro realizado com sucesso
            } else {
                Error($Course->getError(), 'warning');
                //falta os campos serem preenchidos nos inputs ou o input recebeu alguma informação errada
            }
        ?>
        </div>
        <div class="h5 mb-0 text-gray-800 ml-4 mb-2">Cadastrar aulas</div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nome da aula" name="lesson" id="inputPassword"
                    value="<?= isset($Post['lesson'])? $Post['lesson']: '' ?>">
            </div>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Duração</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Duração da aula" name="time"
                    id="inputPassword" value="<?= isset($Post['time'])? $Post['time']: '' ?>">
            </div>
        </div>
        <input type="submit" class="btn btn-success mb-2 ml-4" name="update_course" value="Atualizar curso">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>