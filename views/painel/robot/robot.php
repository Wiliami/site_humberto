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
    <h1></h1>
    <?php
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($Post['acao'])) {
        $arquivo = $_FILES['name']; 

        $arquivoNovo = explode('.', $arquivo);

        if($arquivoNovo[sizeof($arquivoNovo)-1] != 'jpeg') {
            die("Você não pode fazer updload desse tipo de arquivo!");
        } else {
            echo 'Upload feito com sucesso';
            move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$arquivo['name']);
        }
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="acao" value="Enviar">            
    </form>
</div>
<?= $Component->getFooterDashboard();