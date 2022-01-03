<?php 
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <i class="fas fa-list"></i>
            <h1 class="h3 mb-0 text-gray-800 ml-2">Lista de usuários</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table id="listar-usuario" class="display" style="width:100%">
                            <thead>
                            <?php
                                $Read = new Read();
                                $Read->FullRead("SELECT u.*, ul.level_desc
                                    FROM users u
                                    LEFT JOIN users_levels ul ON ul.level_id = u.user_level");
                                if($Read->getResult()) {
                                    foreach($Read->getResult() as $User) { 
                                        ?>
                                <tr>
                                    <th><span class="">*</span></th>
                                    <th><span class="">Usuário</span></th>
                                    <th><span class="">Nível</span></th>
                                    <th><span class="">Data de criação</span></th>
                                    <th><span class="">Status</span></th>
                                    <th><span class="">E-mail</span></th>
                                    <th><span class="">Opções</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span><?= $Component->getAvatarUser(); ?></span>  
                                    </td>
                                    <td>
                                        <span><?= $User['user_name'] ?></span>
                                    </td>
                                    <td>
                                        <span><?= $User['level_desc'] ?></span>
                                    </td>
                                    <td>
                                        <span><?= $User['user_create_date'] ?></span>
                                    </td>
                                    <td>
                                        <span><?= $User['user_email'] ?></span>
                                    </td>
                                    <td>
                                        <a href="<?= BASE ?>/" class="table-link" title="Pesquisar <?= $User['user_name'] ?>">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="<?= BASE ?>/" class="table-link" title="Alterar o nível de <?= $User['user_name'] ?>">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="<?= BASE ?>/" class="table-link danger" title="Excluir <?= $User['user_name'] ?>">
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
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>*</th>
                                    <th>Usuário</th>
                                    <th>Nível</th>
                                    <th>Criado</th>
                                    <th>Status</th>
                                    <th>E-mail</th>
                                    <th>Opções</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>                
                </div>
            </div>
        </div>
    </div>  
    <!-- <a href="<?= BASE ?>/painel/lista-usuario&page= <?= $ListUser['level_id'] ?>" class="d-sm-flex align-items-center justify-content-center btn btn-success mb-2" title="Carregar mais usuários">Carregar mais...</a> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#listar-usuario').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "list-user.php",
                "type": "POST"
            }          
        });
    } );
    </script>
</body>
</html>