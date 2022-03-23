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
                            <th><span>CATEGORIA</span></th>
                            <th><span>VALOR DO CURSO</span></th>
                            <th><span>CAD. POR</span></th>
                            <th><span>ATU. POR</span></th>
                            <th><span>OPÇÕES</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM cursos");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Cursos) {
                                ?>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <td>
                                <span><?= $Cursos['curso_titulo'] ?></span>
                            </td>
                            <td>
                                <span><?= $Cursos['curso_categoria'] ?></span>
                            </td>
                            <td>
                                <span>R$<?= number_format($Cursos['curso_valor'], 2, ',', '.') ?></span>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/courses/update&update_curso=<?= $Cursos['curso_id'] ?>" class="table-link btn-sm" title="Editar <?= $Cursos['curso_titulo'] ?>">
                                    <span class="fa-stack fa-sm">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/modules/list&course=<?= $Cursos['curso_id'] ?>" class="table-link btn-sm" title="Módulos de <?= $Cursos['curso_titulo'] ?>" style="color: #1cc88a;">
                                    <span class="fa-stack fa-sm">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-book fa-stack-1x fa-inverse" aria-hidden="true"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/delete&delete_curso=<?= $Cursos['curso_id'] ?>" class="table-link danger btn-sm" title="Excluir <?= $Cursos['curso_titulo'] ?>" style="color: red;">
                                    <span class="fa-stack fa-sm">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            Error("Ainda não existe lista dos cursos!", 'warning');
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th><span>NOME DO CURSO</span></th>
                            <th><span>CATEGORIA</span></th>
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
