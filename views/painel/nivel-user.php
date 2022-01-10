<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table id="table-niveis" class="table table-striped table-bordered" style="width: 100%;">
                        <div class="d-sm-flex align-items-center justify-content-start mb-4">
                            <i class="fas fa-users"></i> 
                            <h1 class="h3 mb-0 text-gray-800">Nível de usuários</h1>
                        </div>
                        <thead>
                            <tr>
                                <th>Nível Usuário</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Read = new Read();
                            $Read->FullRead("SELECT * FROM users_levels");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Level) {
                                    ?>
                            <tr>
                                <td>
                                    <span><?= $Level['level_desc'] ?></span>
                                </td>
                                <td>
                                    <a href="<?= BASE ?>/painel/level-user/nivel-usuario&nivel=<?= $Level['level_id']?>" class="table-link btn btn-primary mb-2" title="Pesquisar usuários de nível <?= $Level['level_desc'] ?>">
                                        <span class="">
                                            <!-- <i class="fas fa-search"></i> -->
                                            <i class="fas fa-search fa-sm"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                            } else {
                                Error("Ainda não existem usuários!");
                            }   
                            ?>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>  
</div>
<?= $Component->getFooterDashboard(); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
$("#table-niveis").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum registro foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro foi encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }      
    });
});
</script>
