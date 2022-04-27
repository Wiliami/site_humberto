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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mensagens e alertas</h1>
    </div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Escrever uma mensagem
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title btn btn-success bm-2 vw-100" id="exampleModalLabel">Mensagens e alertas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <?php
                        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                         if(!empty($CrateMessage['register_alerts'])) {
                             $CreateMessage['alerts_message'] = $Post['message_text'];
                             $Message = new Message();
                             $Message->createSendMessagesAndAlerts($CreateMessage);
                                if($Message->getResult()) {
                                    Error($Message->getError());
                                } else {
                                    Error($Message->getError(), 'danger');
                                }
                         }
                        ?>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Escreva sua mensagem aqui</label>
                            <textarea class="form-control" id="message-text" name="message_text" value="<?= isset($Post['message_text'])? $Post['message_text']: '' ?>"></textarea>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-success mb-2" data-dismiss="modal" value="Cancelar">
                            <input type="submit" class="btn btn-success mb-2" name="register_alerts" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>