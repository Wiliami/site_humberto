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
            <h6 class="m-0 font-weight-bold text-dark">Histórico | Compras de cursos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-compras" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Nome do curso</th>
                            <th>Data da compra</th>
                            <th>Valor do curso</th>
                            <th>Usuário</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT c.*, u.user_name, p.curso_titulo, p.curso_valor
                            FROM compras c 
                            LEFT JOIN users u ON u.user_id = c.user_id
                            LEFT JOIN cursos p ON p.curso_id = c.curso_id
                            WHERE c.user_id = :id
                            ", "id={$_SESSION['login']['user_id']}");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Cursos) {
                                ?>
                        <tr>
                            <td>
                                <span><?= $Cursos['curso_titulo'] ?></span>
                            </td>
                            <td>
                                <span><?= date('d/m/Y', strtotime($Cursos['compra_date'])) ?></span>
                            </td>
                            <td>
                                <span>R$<?= number_format($Cursos['curso_valor'], 2, ',', '.') ?></span>
                            </td>
                            <td>
                                <span><?= $Cursos['user_name'] ?></span>
                            </td>
                            <td style="width: 20%;">
                                <a href="/" class="table-link" title="Pesquisar <?= $Cursos['curso_titulo'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="/" class="table-link" title="Atualizar <?= $Cursos['curso_titulo'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="/" class="table-link danger" title="Excluir <?= $Cursos['curso_titulo'] ?>">
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
                                Error("Ainda não existem compras!");
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
    $("#table-compras").DataTable({
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