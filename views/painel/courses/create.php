<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-3">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800">Cadastro de cursos</h1>
    </div>
    <p class="ml-0 mb-4">Página de cadastro de cursos</p>
    <form method="post">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['register_course'])) {
            $CreateCourse['curso_titulo'] = $Post['title'];
            $CreateCourse['curso_descricao'] = $Post['description'];
            $CreateCourse['curso_categoria'] = $Post['category'];
            $Course = new Course();
            $Course->createCourse($CreateCourse);
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
        <div class="form-group">
            <label for="exampleInputEmail1">Curso</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Nome do curso" 
            value="<?= isset($Post['title'])? $Post['title']: '' ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description" placeholder="Descrição do curso" 
            value="<?= isset($Post['description'])? $Post['description']: '' ?>">
        </div>
        <div class="form-group">
            <label for="example">Categoria</label>
                <select class="form-control" id="inputPassword" name="category">
                <?php
                $Read = new Read();
                $Read->FullRead('SELECT * FROM categoria_cursos');
                    if($Read->getResult()) {
                        foreach($Read->getResult() as $category) {
                            echo "<option value='{$category['categoria_id']}'>{$category['categoria_name']}</option>";
                        }
                    } else {
                        echo "<option value=''>Ainda não existem categorias!</option>"; 
                    }
                ?>
                </select>
        </div>
        <input type="submit" class="btn btn-success mb-2" name="register_course" value="Cadastrar curso">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>