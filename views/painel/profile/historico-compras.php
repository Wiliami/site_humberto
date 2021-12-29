<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();  
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-shopping-cart"></i>
        <h1 class="h3 mb-0 text-gray-800 ml-2">Histórico | Compras de cursos</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span class="btn btn-warning">Nome do curso</span></th>
                                <th><span class="btn btn-warning">Data da compra</span></th>
                                <th class="text-center"><span class="btn btn-warning">Valor do curso</span></th>
                                <th><span class="btn btn-warning">Usuário</span></th>
                                <th><span class="btn btn-warning">Opções</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Read = new Read();
                            $Read->FullRead("SELECT c.*, u.user_name FROM cursos c LEFT JOIN users u ON u.user_id");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Cursos) {
                                    ?>
                                    <tr>
                                <td>
                                    <span class="user-subhead btn btn-light"><?= $Cursos['curso_titulo'] ?></span>
                                </td>
                                <td>
                                    <span class="btn btn-light"><?= $Cursos['curso_create_date'] ?></span>  
                                </td>
                                <td class="text-center">
                                    <span class="btn btn-light">50,00 reais</span>
                                </td>
                                <td>
                                    <span class="btn btn-light"><?= $Cursos['user_name'] ?></span>
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
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>  
</div>
<?php
echo $Component->getFooterDashboard();
?>

