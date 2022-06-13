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
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Todos os usuários</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-list-users" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr class="btn-sm">
                            <th>#</th>
                            <th>Usuário</th>
                            <th>Nível</th>
                            <th>Criado</th>
                            <th>Status</th>
                            <th>E-mail</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $Read = new Read();
                            $Read->FullRead("SELECT u.*, ul.level_desc 
                                    FROM users u 
                                    LEFT JOIN users_levels ul ON ul.level_id = u.user_level");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $User) {                    
                                    ?>
                        <tr class="btn-sm">
                            <td>
                                <span><?= $Component->getAvatarUser(); ?></span>
                            </td>
                            <td>
                                <span><?= $User['user_name'] ?></span>
                            </td>
                            <td>
                                <span><?= $User['level_desc'] ?>
                            </td></span>
                            <td>
                                <span><?= date('d/m/Y', strtotime($User['user_create_date'])) ?></span>
                            </td>
                            <td>
                                <span>Situação</span>
                            </td>
                            <td>
                                <span><?= $User['user_email'] ?></span>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/courses/list" class="table-link"
                                    title="Pesquisar <?= $User['user_name'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/update" class="table-link"
                                    title="Alterar nível de <?= $User['user_name'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>#" class="table-link danger"
                                    title="Excluir <?= $User['user_name'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                            Error("Ainda não existem usuários!");
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="btn-sm">
                            <th>*</th>
                            <th>Usuário</th>
                            <th>Nível</th>
                            <th>Criado</th>
                            <th>Status</th>
                            <th>E-mail</th>
                            <th>Opções</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>
<script src="<? BASE ?>/src/datatables/jquery.dataTables.min.js"></script>
<script src="<? BASE ?>/src/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $("#table-list-users").DataTable({
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