<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800 ml-4">Cadastro de cursos</h1>
    </div>
    <p class="ml-4">Página de cadastro de cursos</p>
    <input type="submit" class="btn btn-success mb-2 ml-4" name="register_category" value="Cadastrar categoria">

    <form method="post">
        <div class="px-4 py-sm-5 py-3">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['register_course'])) {
            $CreateCourse['curso_titulo'] = $Post['title'];
            $CreateCourse['curso_descricao'] = $Post['description'];
            $CreateCourse['curso_categoria'] = $Post['category'];
            $User = new User();
            $User->createCourse($CreateCourse);
            if($User->getResult()) {
                header('Location: ' . BASE . '/painel/courses/update');
                Error($User->getError());
                // cadastro realizado com sucesso
            } else {
                Error($User->getError(), 'warning');
                //falta os campos serem preenchidos nos inputs ou o input recebeu alguma informação errada
            }   
        }
        ?>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nome do curso" name="title" id="inputPassword"
                    value="<?= isset($Post['title'])? $Post['title']: '' ?>">
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
        <input type="submit" class="btn btn-success mb-2 ml-4" name="register_course" value="Cadastrar curso">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>