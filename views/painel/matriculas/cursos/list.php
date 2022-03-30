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
            <h6 class="m-0 text-dark" style ="font-size: 13px;">Lista de cursos</h6>
            <a href="<?= BASE ?>/painel/matriculas/cursos/create&username=<?= $Username['user_id'] ?>" class="btn btn-success rounded-pill" style="border-radius: 50%; font-size: 11px;">Nova matrícula</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="lista-matriculas" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr style="font-size: 10px;">
                            <th><span>CURSO</span></th>
                            <th><span>DATA DA CRIAÇÃO</span></th>
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
                            foreach($Read->getResult() as $matriculation) {
                                ?>
                        <tr style="font-size: 10px;">
                            <td>
                                <span><?= $matriculation['curso_titulo'] ?></span>
                            </td>
                            <td>
                                <span><?= date('d/m/Y', strtotime($matriculation['curso_create_date'])) ?></span>
                            </td>
                            <td> 
                                <span><?= $matriculation['user_create'] ?></span>
                            </td>
                            <td>
                                <span><?= $matriculation['user_update'] ?></span>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/matriculas/cursos/update&matricula_update=<?= $matriculation['curso_id'] ?>" class="btn-sm" title="Editar matrícula"><i class="fas fa-edit"></i></a>
                                <a href="<?= BASE ?>/painel/matriculas/cursos/matriculados&course=<?= $matriculation['curso_id'] ?>" title="Usuários cadastrados em <?= $matriculation['curso_titulo'] ?>"><i class="fas fa-book"></i></a>
                                <a href="<?= BASE ?>/painel/matriculas/cursos/delete&delete_matricula=<?= $matriculation['curso_id'] ?>" class="btn-sm" title="Excluir curso <?= $matriculation['curso_titulo'] ?>" style="color: red;"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        } 
                        ?>
                    </tbody>
                    <tfoot>
                        <tr style="font-size: 10px;">
                            <th><span>CURSO</span></th>
                            <th><span>DATA DA CRIAÇÃO</span></th>
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
    $("#lista-matriculas").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum curso foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>