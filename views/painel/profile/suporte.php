<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
?>
<!-- Conteúdo que vai ser exibido -->
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Suporte</h1>
    </div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Descrever um problema</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title btn btn-success bm-2 vw-100" id="exampleModalLabel">Entre em contato conosco</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nome</label>
                    <input type="text" class="form-control" name="name" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">E-mail</label>
                    <input type="text" class="form-control" name="email" id="recipient-email">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Como podemos ajudá-lo?</label>
                    <textarea class="form-control" id="message-text"></textarea>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFileLang" lang="pt-BR">
                    <label class="custom-file-label" for="customFileLang">Arquivos</label>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-success mb-2" data-dismiss="modal" value="Cancelar">
                <input type="button" class="btn btn-success mb-2" value="Enviar">
            </div>
            </div>
        </div>
    </div>
</div>
<?php
echo $Component->getFooterDashboard();
?>