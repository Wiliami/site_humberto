<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();  
echo $Component->getMenuSideBarDashboard();  
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Olá, <?= $_SESSION['login']['user_name'] ?></h1>
                        </div>
                        <p>Minhas compras</p>
                    </div>
                        <thead>
                            <tr>
                            <th><span class="btn btn-warning mb-2">Nome do curso</span></th>
                            <th><span class="btn btn-warning mb-2">Data da compra</span></th>
                            <th class="text-center"><span class="btn btn-warning mb-2">Valor do curso</span></th>
                            <th><span class="btn btn-warning mb-2">Opções</span></th>
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
                                <span class="user-subhead btn btn-light mb-2"><?= $Cursos['curso_titulo'] ?></span>
                            </td>
                            <td>
                                <span class="btn btn-light mb-2"><?= $Cursos['curso_create_date'] ?></span>
                            </td>
                            <td class="text-center">
                                <span class="btn btn-light mb-2">50,00 reais</span>
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
</div
<?php
echo $Component->getFooterDashboard();
?>
