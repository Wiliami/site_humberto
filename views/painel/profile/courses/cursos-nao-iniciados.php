<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
$Username = $_SESSION['login']['user_name'];
$userId = $_SESSION['login']['user_id'];
?>
<div class="container">
    <div class="row gx-5 container">
        <h2 class="h6 mb-0 text-gray-800 ml-4 mt-4">Filtrar por</h2>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categoria
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/courses/cursos-finalizados">Favoritas</a>
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/courses/lesson/">Todas as categorias</a>
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/courses/lesson/">Específicas (lista)</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
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
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar meu cursos" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT m.*, c.curso_titulo, c.curso_descricao, c.curso_img
           FROM matriculas_cursos m 
           LEFT JOIN users u ON u.user_id = m.user_id
           LEFT JOIN cursos c ON c.curso_id = m.curso_id 
           WHERE m.user_id = :ui", "ui={$userId}");
       if($Read->getResult()) {
            foreach($Read->getResult() as $DataCourse) {
                ?>
        <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course=<?= $DataCourse['curso_id'] ?>">
            <div class="col-lg-4 mb-5">
                <div class="card" style="width: 18rem;">
                    <?php
                        if($DataCourse['curso_img']) {
                            ?>
                        <img style="width: 220; height: 270px;" class="card-img-top" src="<?= BASE ?>/uploads/<?= $DataCourse['curso_img']; ?>" alt="Banner do curso">
                    <?php
                        } else {
                            ?>
                        <img style="width: 220; height: 270px;" class="img-thumbnail" src="<?= BASE ?>/assets/images/image-not-found.png" />
                    <?php
                        }
                    ?>
                </div>
                <a href="" class="card-body text-dark">
                    <h5 class="card-title"><?= $DataCourse['curso_titulo'] ?></h5>
                    <p class="card-text"><?= $DataCourse['curso_descricao'] ?></p>
                </a>
            </div>
        </a>
        <?php
            }
        } else {
            ?>
            <div class="alert alert-primary d-block" role="alert">
                Você ainda não possui cursos! 
                <a href="<?= BASE ?>/painel/dashboard">Ver cursos</a>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>