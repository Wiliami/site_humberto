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
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
?>
<div class="container"> 
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-start mb-3">
            <h1 class="h5 mb-0 text-gray-800">Nome da página</h1>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['create_course'])) {
                    $CreateCourse['curso_titulo'] = $Post['title'];
                    $CreateCourse['curso_descricao'] = $Post['description'];
                    $CreateCourse['curso_categoria'] = $Post['category'];
                    $CreateCourse['curso_valor'] = $Post['value'];
                    $Course = new Course();
                    $Course->createCourse($CreateCourse);   
                    if($Course->getResult()) {  
                    
                        if(!empty($_FILES['curso_img'])) {
                            // Check::var_dump_json($_FILES);
                            $Upload = new Upload();
                            $Upload->image($_FILES['curso_img']);
                            if($Upload->getResult()) {
                                $DataUpdateCourse['curso_img'] = $Upload->getResult();
                                $Update = new Update();
                                $Update->ExeUpdate('cursos', $DataUpdateCourse, 'WHERE curso_id = :ci', "ci={$Course->getResult()}");
                                if($Update->getResult()) {
                                    Error($Update->getError());
                                }
                            }
                        }

                        Error($Course->getError());
                        header('Location: ' . BASE . '/painel/courses/update&create=true&update_curso=' . $Course->getResult());
                        die();


                    } else {
                        Error($Course->getError(), 'danger');
                    }
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Curso</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Nome do curso" 
                    value="<?= isset($Post['title'])? $Post['title']: '' ?>">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagem do curso</label>
                    <input class="form-control" type="file" name="curso_img">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Descrição</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="description" placeholder="Descrição do curso" 
                    value="<?= isset($Post['description'])? $Post['description']: '' ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Valor</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="value" placeholder="Valor do curso" 
                    value="<?= isset($Post['value'])? $Post['value']: '' ?>">
                </div>
                <div class="form-group">
                    <label for="example">Categoria</label>
                        <select class="form-control" id="inputPassword" name="category">
                        <?php
                        $Read = new Read();
                        $Read->FullRead('SELECT * FROM category_course');
                        if($Read->getResult()) {
                                echo "<option value=''>Selecionar</option>";
                            foreach($Read->getResult() as $DataCategory) {
                                echo "<option value='{$DataCategory['categoria_id']}'>{$DataCategory['categoria_name']}</option>";
                            }
                        } else {
                            echo "<option value=''>Ainda não existem categorias!</option>";
                        }
                        ?>
                        </select>
                </div>
                <a href="<?= BASE ?>/painel/courses/list" class="btn btn-outline-success mb-2" title="Voltar para lista de usuários">Voltar</a>
                <input type="submit" class="btn btn-success mb-2" name="create_course" value="Cadastrar">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>