<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
$Username = $_SESSION['login']['user_name'];
$itens_por_pagina = 10;

// pegar a pagina atual
$pagina = intval($_GET['pagina']);

// puxar os produtos
// pegar a quantidade total de objetos no banco de dados por definir o número de páginas
// $num_paginas = ceil($num_total/$itens_por_pagina);
?>
<div class="container">
    <div class="d-sm-flex flex-column mb-4 ml-4">
        <h1 class="h3">Painel</h1>  
        <h2 class="h5 mb-0 text-gray-800 mt-4">Seja bem-vindo(a), <?= $Username ?></h2>
    </div>
    
    <?php
    if($_SESSION["login"]["user_level"] <= 2) {
        ?>
    <h3 class="h6 ml-4">Lançamentos de cursos</h3>
    <div class="row gx-5 container">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM cursos LIMIT $pagina, $itens_por_pagina");
        if($Read->getResult()) {
            foreach($Read->getResult() as $DataCourse) {
                // Check::var_dump_json($DataCourse);
                ?>
        <a href="<?= BASE ?>/painel/area-membros/area-curso&curso=<?= $DataCourse['curso_id'] ?>">
            <div class="col-lg-4 mb-5">
                <div class="card" style="width: 18rem;">
                    <?php
                    if($DataCourse['curso_img']) {
                        ?>
                    <img style="width: 220; height: 255px;" class="card-img-top" src="<?= BASE ?>/uploads/<?= $DataCourse['curso_img']; ?>" alt="banner do curso">
                    <?php
                    } else {
                        ?>
                    <img style="width: 220; height: 255px;" class="img-thumbnail" src="<?= BASE ?>/assets/images/image-not-found.png" />
                    <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-dark"><?= $DataCourse['curso_titulo'] ?></h5>
                    <p class="card-text text-dark"><?= $DataCourse['curso_descricao'] ?></p>
                    <a href="<?= BASE ?>/painel/profile/area-curso" class="text-dark">R$<?= number_format($DataCourse['curso_valor'], 2, ',', '.') ?></a>
                </div>
            </div>
            <?php
                }
            } else {
                die(Error("Ainda não existem cursos", 'warning'));
            }
            ?>
        </a>
    </div>
    <nav aria-label="Navegação de página exemplo">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <?php
                // $num_total = $Read->getResult();
                // // Check::var_dump_json($num_total);

                // $num_paginas = ceil($num_total/$itens_por_pagina);
                ?>
                <a class="page-link" href="#" tabindex="-1">Anterior</a>
            </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Próximo</a>
            </li>
        </ul>
    </nav>
    <?php
        }
    ?>
          

    <!-- Administrativo -->
    <?php
    if($_SESSION['login']['user_level'] >= 6 ) {
        ?>
    <p class="ml-4">Avisos sobre a plataforma</p>
    <?php
    }
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>        