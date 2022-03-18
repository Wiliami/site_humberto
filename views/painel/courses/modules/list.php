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
$cursoId = filter_input(INPUT_GET, 'course', FILTER_VALIDATE_INT);
$Read = new Read();
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php
            $Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$courseId}");
            if($Read->getResult()) {
                $Course = $Read->getResult()[0];
                //Check::var_dump_json($Course)
                    ?>
                <h6 class="m-0 font-weight-bold text-dark" style="font-size: 12px;"><?= $Course['curso_titulo'] ?></h6>
            <?php
                } else {
                    Error("Curso não encontrado!", 'danger');
                }
            ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-lista-modulos" class="cell-border compact stripe table-striped" style="width: 100%;">
                    <thead>
                        <tr style ="font-size: 10px;">
                            <th><span>MÓDULOS</span></th>
                            <th><span>CAD. POR</span></th>
                            <th><span>ATU. POR</span></th>
                            <th><span>OPÇOES</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read->FullRead("SELECT m.*, a.aula_name 
                        FROM modulos m 
                        LEFT JOIN aulas a ON a.aula_id = m.modulo_id");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Modulos) {
                                ?>
                        <tr style="font-size: 10px;">
                            <td>
                                <span><?= $Modulos['modulo_name'] ?></span>
                            </td>
                            <td>    
                                <span><?= $Modulos['modulo_user_create'] ?></span>
                            </td>
                            <td>
                                <span><?= $Modulos['modulo_user_update'] ?></span>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/courses/lesson/list" class="table-link btn-sm" title="Aulas de <?= $Modulos['aula_name'] ?>" style="color: #1cc88a;">
                                    <span class="fa-stack fa-sm">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fas fa-chalkboard-teacher fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/modules/update&module=<?= $Modulos['modulo_id'] ?>" class="table-link btn-sm" title="Atualizar <?= $Modulos['modulo_name']?>">
                                    <span class="fa-stack fa-sm">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/modules/delete&delete_module=<?= $Modulos['modulo_id'] ?>" class="table-link danger btn-sm" title="Excluir <?= $Modulos['modulo_name'] ?>" style="color: red;"
                                    title="Excluir curso">
                                    <span class="fa-stack fa-sm">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse" text="ola"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            Error("Ainda não existe lista dos módulos!");
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr style="font-size: 10px;">
                            <th><span>MÓDULOS</span></th>
                            <th><span>CAD. POR</span></th>
                            <th><span>ATU. POR</span></th>
                            <th><span>OPÇOES</span></th>
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
    $("#table-lista-modulos").DataTable({
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