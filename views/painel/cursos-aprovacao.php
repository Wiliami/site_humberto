<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable(); 
echo $Component->getMenuSideBarDashboard();
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-address-book"></i>
        <h1 class="h3 mb-0 text-gray-800 ml-2">Cursos | Aprovação de cursos</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table id="listar-curso" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nome do curso</th>
                                <th>Data da compra</th>
                                <th>Status da compra</th>
                                <th>Usuário</th>
                                <th>Opções</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT c.*, u.user_name FROM cursos c LEFT JOIN users u ON u.user_id");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $User) {
                                ?> 
                            <tr>
                                <td>
                                    <?= $User['curso_titulo'] ?>
                                </td>
                                <td>
                                    <?= $User['curso_create_date'] ?>
                                </td>
                                <td class="text-center">
                                    Aguardando aprovação
                                </td>
                                <td>
                                    <?= $User['user_name']?></span>
                                </td>
                                <td style="width: 20%;">
                                    <a href="/" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="/" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="/" class="table-link danger">
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
                                Error("Ainda não existem usuários!");
                            }   
                            ?>
                            <tr>
                                <td>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" style="width: 50px; height: 50px">
                                    <a href="#" class="user-link">Carlos</a>
                                        
                                    <span class="user-subhead">Membro</span>
                                </td>
                                <td>
                                    2021/12/12
                                </td>
                                <td class="text-center">
                                    <span class="label label-default">Inativo</span>
                                </td>
                                <td>
                                    <a href="/">carlos@gmail.com</a>
                                </td>
                                <td style="width: 20%;">
                                    <a href="/" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="#" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="#" class="table-link danger" data-toggle="modal" data-target="#deleteModal">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome do curso</th>
                                <th>Data da compra</th>
                                <th>Status da compra</th>
                                <th>Usuário</th>
                                <th>Opções</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>                
            </div>
        </div>
    </div>  
</div>
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title btn btn-success mb-2 vw-100" id="exampleModalLabel">Excluir usuário</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tem certeza que deseja excluir usuário <?= $User['user_name']?> ?</div>
                <div class="modal-footer">
                    <button class="btn btn-success mb-2" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger mb-2" href="<?= BASE ?>/">Excluir</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
    $("#listar-curso").DataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }      
        });
    });
    </script>
     
