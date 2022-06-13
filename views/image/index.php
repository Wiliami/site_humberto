<?php
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
?>
<div class="container">
    <?php
    if(isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo']['name'];
        $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
        $novo_nome = md5(time()) . "." .$extensao;
    
        $image = $novo_name;
        $diretorio = "upload/";
    
        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);
        $uploadFiles = new uploadFiles;
        $uploadFiles->uploadFiles($image);
        if($uploadFiles->getResult()) {
            Error($uploadFiles->getError());
        } else {
            Error($uploadFiles->getError(), 'warning');
        }
    }
    ?>
    <h1 class="h6">Upload de imagens</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="arquivo">
        <input type="submit" value="Enviar">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>