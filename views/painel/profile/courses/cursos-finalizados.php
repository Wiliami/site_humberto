<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
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
            <h5 class="h5 m-0 text-dark">Olá, <b><?= $_SESSION['login']['user_name'] ?></b></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabela-cursos-finalizados" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr style="font-size: 10px;">
                            <th>NOME DO CURSO</th>
                            <th>TEMPO</th>
                            <th>OPCOES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT c.*, u.user_name 
                            FROM cursos c 
                            LEFT JOIN users u ON u.user_id");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Cursos) {
                                ?>
                        <tr style="font-size: 10px;">
                            <td>
                                <span><?= $Cursos['curso_titulo'] ?></span>
                            </td>
                            <td>
                                <span><?= $Cursos['curso_create_date'] ?></span>
                            </td>
                            <td style="width: 20%;">
                                <a href="/" class="table-link" style="color: green;">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <?php
                                }
                            } else {
                                die(Error("Lista de usuários não encontrada!", 'warning'));
                            }   
                            ?>
                    </tbody>
                    <tfoot>
                        <tr style="font-size: 10px;">
                            <th>NOME DO CURSO</th>
                            <th>TEMPO</th>
                            <th>OPCOES</th>
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
    $("#tabela-cursos-finalizados").DataTable({
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