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
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Lista de módulos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-lista-modulos" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th><span>Nome do módulo</span></th>
                            <th><span>Data de cadastro</span></th>
                            <th><span>Descrição</span></th>
                            <th><span>Opções</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM modulos");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Modulos) {
                                ?>
                        <tr>
                            <td>
                                <span><?= $Modulos['modulo_name'] ?></span>
                            </td>
                            <td>
                                <span><?= $Modulos['modulo_create_date'] ?></span>
                            </td>
                            <td>
                                <span><?= $Modulos['modulo_descricao'] ?></span>
                            </td>
                            <td>
                                <!-- <a href="<?= BASE ?>/" class="table-link" title="Pesquisar usuários">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a> -->
                                <a href="<?= BASE ?>/painel/courses/update" class="table-link" title="Atualizar <?= $Modulos['modulo_name']?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/delete" class="table-link danger" title="Excluir <?= $Modulos['modulo_name'] ?>"
                                    title="Excluir curso">
                                    <span class="fa-stack">
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