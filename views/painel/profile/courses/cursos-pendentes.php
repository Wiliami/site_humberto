<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
$Username = $_SESSION['login']['user_name'];
$userId = $_SESSION['login']['user_id'];

$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4 d-block">
        <h1 class="h5 mb-0 text-gray-800 ml-4">Cursos pendentes</h1>
    </div>

    <h2 class="h6 mb-0 text-gray-800 ml-4 mt-4">Filtrar por</h2>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categoria
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= BASE ?>/painel/profile/courses/">Favoritas</a>
                        <a class="dropdown-item" href="<?= BASE ?>/painel/profile/courses/">Todas as categorias</a>
                        <a class="dropdown-item" href="<?= BASE ?>/painel/profile/courses/">Específicas (lista)</a>
                    </div>
                </li>
                <li class="nav-item dropdown ml-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Progresso
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= BASE ?>/painel/profile/courses/cursos-finalizados">Concluído</a>
                        <a class="dropdown-item" href="<?= BASE ?>/painel/profile/courses/cursos-pendentes">Em andamento</a>
                        <a class="dropdown-item" href="<?= BASE ?>/painel/profile/courses/cursos-nao-iniciados">Não iniciado</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST">
                <input type="search" class="form-control mr-sm-2" name="filter" placeholder="Pesquisar meus cursos" value="<?= (!empty($Post['filter']) ? $Post['filter'] : null) ?>" aria-label="Search">
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Pesquisar</button>
            </form>
        </div>
    </nav>



    <div class="row gx-5 container">
        <?php
        $Query = null;
        $Parse = null;
        if(!empty($Post['filter'])) {
            $Query = " AND curso_titulo LIKE :title";
            $Parse = "&title=%{$Post['filter']}%";
        }
        $Read = new Read();
        $Read->FullRead("SELECT m.*, c.curso_titulo, c.curso_descricao, c.curso_img
            FROM matriculas_cursos m
            LEFT JOIN users u ON u.user_id = m.user_id
            LEFT JOIN cursos c ON c.curso_id = m.curso_id
            WHERE m.user_id = :ui{$Query}", "ui={$userId}{$Parse}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $DataMatriculas) {
                // Check::var_dump_json($DataMatriculas);
                ?>
        <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course=<?= $DataMatriculas['curso_id'] ?>">
            <div class="col-lg-4 mb-5">
                <div class="card" style="width: 18rem;">
                <?php
                    if($DataMatriculas['curso_img']) {
                        ?>
                    <img style="width: 220; height: 255px;" class="card-img-top" src="<?= BASE ?>/uploads/<?= $DataMatriculas['curso_img']; ?>" alt="Banner do curso">
                <?php
                    } else {
                        ?>
                    <img style="width: 220; height: 255px;" class="img-thumbnail" src="<?= BASE ?>/assets/images/image-not-found.png" />
                <?php
                    }
                ?>
                </div>
                <a href="" class="card-body text-dark">
                    <h5 class="card-title"><?= $DataMatriculas['curso_titulo'] ?></h5>
                    <p class="card-text"><?= $DataMatriculas['curso_descricao'] ?></p>
                </a>
            </div>
        </a>
        <?php
            }
        } else {
            ?>
            <div class="alert alert-primary d-block" role="alert">
                Nenhuma correspondência encontrada!
                <!-- <a href="<?= BASE ?>/painel/dashboard">Ver cursos</a> -->
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>