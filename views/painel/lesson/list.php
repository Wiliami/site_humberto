<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component(); 
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
            <h6 class="m-0 font-weight-bold text-dark">Lista de aulas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-lista-cursos" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th><span>Nome da aula</span></th>
                            <th><span>Data de cadastro</span></th>
                            <th><span>Duração da aula</span></th>
                            <th><span>Opções</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM aulas");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Aulas) {
                                ?>
                        <tr>
                            <td>
                                <span><?= $Aulas['aula_name'] ?></span>
                            </td>
                            <td>
                                <span><?= $Aulas['aula_create_date'] ?></span>
                            </td>
                            <td>
                                <span><?= $Aulas['aula_duracao'] ?></span>
                            </td>
                            <td>
                                <!-- <a href="<?= BASE ?>/" class="table-link" title="Pesquisar usuários">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a> -->
                                <a href="<?= BASE ?>/painel/lesson/update&aula=<?= $Aulas['aula_id'] ?>" class="table-link" title="Editar <?= $Aulas['aula_name'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/lesson/delete" class="table-link danger" title="Excluir <?= $Aulas['aula_name'] ?>">
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
                            Error("Ainda não existe lista dos cursos!");
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
        $("#lista-aulas").DataTable({
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
