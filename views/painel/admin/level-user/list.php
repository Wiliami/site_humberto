<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
$nivelId = $_GET['nivel'];
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT * FROM users_levels WHERE level_id = :ld", "ld={$nivelId}");
            if($Read->getResult()) {
                foreach($Read->getResult() as $LevelUser) {
                    ?>
            <h6 class="m-0 font-weight-bold text-dark">Usuários nível: <?= $LevelUser['level_desc'] ?></h6>
            <a href="<?= BASE ?>/painel/admin/nivel-user" class="btn btn-success mb-2" title="Voltar para lista de usuários">Voltar</a>
            <?php
                }
            } else {
                Error("Ainda não existe essa lista de usuários!");
            }   
            ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabela-niveis" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th><span>Perfil</span></th>
                            <th><span>Usuário</span></th>
                            <th><span>Status</span></th>
                            <th><span>E-mail</span></th>
                            <th><span>Opções</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read->FullRead("SELECT * FROM users WHERE user_level = :ul", "ul={$NivelId}");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Users) {
                                ?>
                        <tr>
                            <td>
                                <?= $Component->getAvatarUser(); ?>
                            </td>
                            <td>
                                <span><?= $Users['user_name'] ?></span>
                            </td>
                            <td>
                                <span><?= $Users['user_status'] ?></span>
                            </td>
                            <td>
                                <span><?= $Users['user_email'] ?></span>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/" class="table-link"
                                    title="Alterar o nível de <?= $Users['user_name'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            Error("Ainda não existe usuários para esse nível!");
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $("#tabela-niveis").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum registro foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_ registros",
            "infoEmpty": "Nenhum registro foi encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>