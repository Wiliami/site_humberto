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
            <h6 class="m-0 font-weight-bold text-dark">Lista de categorias</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-lista-categoria" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr class="btn-sm"> 
                            <th><span>Nome da categoria</span></th>
                            <th><span>Cadastrado por</span></th>
                            <th><span>Atualizado por</span></th>
                            <th><span>Opções</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM categoria_cursos");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Categoria) {
                                ?>
                        <tr class="btn-sm">
                            <td>
                                <span><?= $Categoria['categoria_name']?></span>
                            </td>
                            <td>
                                <span><?= $Categoria['categoria_user_create']?></span>
                            </td>
                            <td>
                                <span><?= $Categoria['categoria_user_update'] ?></span>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/courses/categorias/update&categoria_update=<?= $Categoria['categoria_id'] ?>" class="table-link" title="Editar <?= $Categoria['categoria_name'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/categorias/delete&categoria_delete=<?= $Categoria['categoria_id'] ?>" class="table-link danger" style="color: red;" title="Excluir <?= $Categoria['categoria_name'] ?>">
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
                            Error("Ainda não existe lista de categoria!");
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="btn-sm"> 
                            <th><span>Categoria</span></th>
                            <th><span>Cadastrado por</span></th>
                            <th><span>Atualizado por</span></th>
                            <th><span>Opções</span></th>
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
    $("#table-lista-categoria").DataTable({
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