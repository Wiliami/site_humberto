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
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <div class="h5 m-0 text-dark" style="font-size: 14px">Lista de cursos</div>
            <a href="<?= BASE ?>/painel/courses/create" class="btn btn-success rounded-pill" style="border-radius: 50%; font-size: 11px;">Cadastrar novo curso</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-lista-cursos" class="cell-border compact stripe table-striped" style="width: 100%;">
                    <thead>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th><span>NOME DO CURSO</span></th>
                            <th><span>VALOR DO CURSO</span></th>
                            <th><span>CAD. POR</span></th>
                            <th><span>ATU. POR</span></th>
                            <th><span>OPÇÕES</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT c.*, uc.user_name as user_create, uu.user_name as user_update
                            FROM cursos c
                            LEFT JOIN users uc ON uc.user_id = c.curso_user_create
                            LEFT JOIN users uu ON uu.user_id = c.curso_user_update");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Courses) {
                                ?>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <td>
                                <span><?= $Courses['curso_titulo'] ?></span>
                            </td>
                            <td>
                                <span>R$<?= number_format($Courses['curso_valor'], 2, ',', '.') ?></span>
                            </td>
                            <td>
                                <span><?= $Courses['user_create'] ?></span>
                            </td>
                            <td>
                                <span><?= $Courses['user_update'] ?></span>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/courses/update&update_curso=<?= $Courses['curso_id'] ?>" class="btn-sm" title="Editar <?= $Courses['curso_titulo'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?= BASE ?>/painel/courses/modules/list&course=<?= $Courses['curso_id'] ?>" class="btn-sm" title="Módulos de <?= $Courses['curso_titulo'] ?>" style="color: #1cc88a;"><i class="fas fa-book"></i></a>
                                <a href="<?= BASE ?>/painel/courses/delete&delete_curso=<?= $Courses['curso_id'] ?>" class="danger btn-sm" title="Excluir <?= $Courses['curso_titulo'] ?>" style="color: red;"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            Error("Cursos não encontrados", 'warning');
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th><span>NOME DO CURSO</span></th>
                            <th><span>VALOR DO CURSO</span></th>
                            <th><span>CAD. POR</span></th>
                            <th><span>ATU. POR</span></th>
                            <th><span>OPÇÕES</span></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $("#table-lista-cursos").DataTable({
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