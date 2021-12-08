<?php
    $User = new User();
    $User->verifyExistLoginUser();
    $Component = new Component();
    echo $Component->getHeadHtmlReset();
?>

<body> 
    <section class="py-lg-5">
        <div class="col-lg-7">
            <form class="p-3" id="contact-form" method="post">
            <div class="card-header px-4 py-sm-5 py-3">
                <h2>Cadastro de curso!</h2>
                <p class="lead">Preencha os campos e cadastre os cursos</p>
                <?php
                    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    if(!empty($Post['register_course'])) {
                        $CreateCourse['curso_titulo'] = $Post['title'];
                        $CreateCourse['curso_descricao'] = $Post['description'];
                        $CreateCourse['curso_categoria'] = $Post['category'];

                        $User = new User();
                        $User->createCourse($CreateCourse);
                        if($User->getResult()) {
                            Error($User->getError());
                        } else {
                            Error($User->getError(), 'warning');
                        }
                    }
                ?>
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
                    <input type="submit" class="btn bg-gradient-success mb-0" name="register_course" value="Cadastrar">
                </div>
                </div>
            </div>
            </form>

            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </section>

<?php
    $Component = new Component();
    echo $Component->getFooterDashboard();
?>