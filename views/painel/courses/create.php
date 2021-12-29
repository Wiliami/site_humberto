<?php
$User = new User();
$User->verifyExistLoginUser();
// $User->verifyLevelUserModerator();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<!-- <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create | Cadastrar cursos</h1>
    </div>
        <p>Página de cadastro de cursos</p>
</div>

<div class="col-lg-7">
    <form>
        <div class="card-header px-4 py-sm-5 py-3">
            
        </div>
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-md-12 pe-2 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Título</label>
                            <input type="text" class="form-control" name="title" placeholder="Titulo do curso" value ="<?= isset($Post['title'])? $Post['title']: '' ?>" >
                        </div>
                    </div>
                    <div class="col-md-12 pe-2 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Descrição do curso</label>
                            <input type="text" class="form-control" name="description" placeholder="Informações sobre o curso" value="<?= isset($Post['description'])? $Post['description']: '' ?>" >
                        </div>
                    </div>
                    <div class="col-md-12 pe-2 mb-3">
                            <div class="input-group input-group-static mb-4">
                                <label>Selecione uma categoria</label>
                                <input type="text" class="form-control" name="category" placeholder="Categoria do curso, Ex: Categoria Finanças" value="<?= isset($Post['category'])? $Post['category']: '' ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-end ms-auto">
                            <input type="submit" class="btn btn-primary mb-2" name="register_course" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </form>
        </div> -->


        



        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-start mb-4">
                <i class="fas fa-layer-plus"></i>
                <h1 class="h3 mb-0 text-gray-800 ml-2">Create | Cadastrar cursos</h1>
            </div>
                <p>Página de cadastro de cursos</p>
        </div>

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
                        //falta os campos serem preenchidos no inputs ou o input recebeu informação errada
                    }   
                }
                ?>
            </div>
            <div class="form-group row ml-4">
                <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nome do curso" name="title" id="inputPassword" value="<?= isset($Post['title'])? $Post['title']: '' ?>">
                </div>
            </div>
            <div class="form-group row ml-4">
                <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Descrição do curso" name="description" id="inputPassword" value="<?= isset($Post['description'])? $Post['description']: '' ?>">     
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
<?php
echo $Component->getFooterDashboard();
?>