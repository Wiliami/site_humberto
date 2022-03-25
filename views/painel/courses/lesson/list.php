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
$moduleId = filter_input(INPUT_GET, 'modulo', FILTER_VALIDATE_INT);
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT * FROM modulos WHERE modulo_id = :mi", "mi={$moduleId}");
            if($Read->getResult()) {
                $DataModule = $Read->getResult()[0];
                    ?>
                <h6 class="m-0 text-dark" style="font-size: 13px;">Aulas do módulo: <b><?= $DataModule['modulo_name'] ?></b></h6>
            <?php
            } else  {
                Error("Módulo não encontrado!", 'danger');
            }
            ?>
            <a href="<?= BASE ?>/painel/courses/lesson/create" class="btn btn-success rounded-pill" style="border-radius: 50%; font-size: 11px;">Cadastrar nova aula</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-lista-cursos" class="cell-border compact stripe table-striped">
                    <thead>
                        <tr class="btn-sm" style="font-size: 10px">
                            <th><span>AULAS</span></th>
                            <th><span>DURAÇÃO DA AULA</span></th>
                            <th><span>URL DA AULA</span></th>
                            <th><span>CAD. POR</span></th>
                            <th><span>ATU. POR </span></th>
                            <th><span>OPÇÕES</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM aulas");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Aulas) {
                                ?>
                        <tr style="font-size: 10px">
                            <td>
                                <span><?= $Aulas['aula_name'] ?></span>
                            </td>
                            <td class="text-center">
                                <span><?= $Aulas["aula_duracao"] ?></span> 
                            </td>
                            <td>
                                <span><?= $Aulas['aula_url'] ?></span>
                            </td>
                            <td>
                                
                            </td>
                            <td>

                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/courses/lesson/update&aula=<?= $Aulas['aula_id'] ?>" class="table-link btn-sm" title="Editar <?= $Aulas['aula_name'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/lesson/delete&delete_aula=<?= $Aulas['aula_id'] ?>" class="table-link danger btn-sm" title="Excluir <?= $Aulas['aula_name'] ?>" style="color: #e74a3b;">
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
                            Error("Lista de cursos não encontrada!", 'danger');
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr style="font-size: 10px">
                            <th><span>AULAS</span></th>
                            <th><span>DURAÇÃO DA AULA</span></th>
                            <th><span>URL DA AULA</span></th>
                            <th><span>CAD. POR</span></th>
                            <th><span>ATU. POR </span></th>
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
                "zeroRecords": "Nenhum resultado foi encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
    });
</script>
