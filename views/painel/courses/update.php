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
                <h2>Cadastro de curso</h2>
                <p class="lead">Preencha os campos e cadastre os cursos</p>
            </div>
            <div class="card-body pt-1">
                <div class="row">
                <div class="col-md-12 pe-2 mb-3">
                    <div class="input-group input-group-static mb-4">
                    <label>Título</label>
                    <input type="text" class="form-control" placeholder="Titulo do curso">
                    </div>
                </div>
                <div class="col-md-12 pe-2 mb-3">
                    <div class="input-group input-group-static mb-4">
                    <label>Descrição do curso</label>
                    <input type="text" class="form-control" placeholder="Informações sobre o curso">
                    </div>
                </div>
                <div class="col-md-12 pe-2 mb-3">
                    <div class="input-group input-group-static mb-4">
                    <label>Selecione uma categoria</label>
                    <input type="text" class="form-control" placeholder="Categoria do curso, Ex: Categoria Finanças">

                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 text-end ms-auto">
                    <input type="submit" class="btn bg-gradient-success mb-0" name="register course" value="Cadastrar">
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