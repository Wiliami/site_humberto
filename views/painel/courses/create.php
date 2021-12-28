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
            <!-- ***Page Heading*** -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Create | Cadastrar cursos</h1>
            </div>
                <p>Página de cadastro de cursos</p>
        </div>

        <form method="post">
            <div class="card-header px-4 py-sm-5 py-3">
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
                        //falta os campos serem preenchidos no inputs ou o input recebru informação errada
                    }   
                }
                ?>
            </div>
            <div class="form-group row" style="margin-left: 20px;">
                <label for="inputPassword" class="col-sm-1 col-form-label">Título</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Título do curso" name="title" id="inputPassword" value="<?= isset($Post['title'])? $Post['title']: '' ?>">
                </div>
            </div>
            <div class="form-group row" style="margin-left: 20px;">
                <label for="inputPassword" class="col-sm-1 col-form-label">Descriçao</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Descrição do curso" name="description" id="inputPassword" value="<?= isset($Post['description'])? $Post['description']: '' ?>">     
                </div>
            </div>
            <div class="form-group row" style="margin-left: 20px;">
                <label for="inputPassword" class="col-sm-1 col-form-label">Categoria</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" placeholder="Selecione uma categoria" name="category" value="<?= isset($Post['category'])? $Post['category']: '' ?>">
                </div>
            </div>
            <input type="submit" class="btn btn-primary mb-2" name="register_course" value="Cadastrar curso" style="margin: 30px;">
        </form>
<?php
echo $Component->getFooterDashboard();
?>