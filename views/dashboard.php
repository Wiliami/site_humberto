

                <!-- Nav Item - Pages Collapse Menu -->
                <!-- <?php 
                    if($_SESSION['login']['user_level'] >= 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapsePages"
                                    aria-expanded="true" aria-controls="collapsePages">
                                    <i class="fas fa-fw fa-folder"></i>
                                    <span>Administrativo</span>
                                </a>

                                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <a class="collapse-item" href="<?= BASE ?>/list-user">Lista de usuários</a>
                                        <a class="collapse-item" href="<?= BASE ?>/cursos-aprovacao">Cursos em análise</a>
                                        <a class="collapse-item" href="<?= BASE ?>/historico-compras">Histórico de compras</a>
                                        <a class="collapse-item" href="<?= BASE ?>/suporte">Suporte</a>
                                        <a class="collapse-item" href="<?= BASE ?>/settings">Configurações</a>
                                    </div>
                                </div>

                            </li>
                        
                <?php
                }?> -->

               



<?php

$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();

echo $Component->getHeadHtmlPages();
echo $Component->getMenuAndSideBarDashboard();
echo $Component->getBarraMenuOptions();
?>
Configurações
<?php
echo $Component->getFooterDashboard();

?>

       