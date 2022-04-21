<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
$Username = $_SESSION['login']['user_name'];
$courseId = filter_input(INPUT_GET, 'course', FILTER_VALIDATE_INT);

// $Read = new Read();
// $Read->FullRead('SELECT * FROM aulas WHERE aula_id = :ai', "ai={$aulaId}");
// if($Read->getResult()) {
//     $DataLesson = $Read->getResult()[0];
// } else {
//     die(Error('Aula não encontrada!', 'warning'));
// }
?>
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE ?>/painel/dashboard">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="<?= BASE ?>/src/images/icon_small.png" alt="logo unit" class="btn-sm" style="width: 45px; height: 40px;">
            </div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active"></li>
        <hr class="sidebar-divider">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM modulos WHERE curso_id = :ci", "ci={$courseId}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Modules) {
                ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $Modules['modulo_id'] ?>"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <span><?= $Modules['modulo_name'] ?></span>
                    </a>
                    <div id="collapse<?= $Modules['modulo_id'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            $Read->FullRead("SELECT * FROM aulas WHERE modulo_id = :mi", "mi={$Modules['modulo_id']}");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Lesson) {
                                    ?>
                            <a class="collapse-item" href="<?= BASE ?>/painel/profile/courses/lesson/details&a=<?= $Lesson['aula_id'] ?>"><?= $Lesson['aula_name'] ?></a>
                            <!-- <a href="/painel/profile/courses/lesson= $Lesson['aula_id'] "></a> -->
                            <?php               
                                }
                            } else {
                                Error('Aula não encontrada!', '');
                            }
                            ?>
                        </div>
                    </div>
                </li>
        <?php
            }
        } else {
            Error('Módulos não encontrados', 'warning');
        }
        ?>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Procurar aulas..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form method="post" class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Procurar aulas..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Seja bem-vindo(a), <?= $Username ?></span>
                            <img class="img-profile rounded-circle"
                                src="<?= BASE ?>/src/images/undraw_profile.svg">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/pages/profile-user">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Minha conta
                            </a>
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/pages/reset-password">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Mudar senha
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Sair
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>




            <!-- Conteúdo da página -->
              <!-- Begin Page Content -->
              <div class="container">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Área do curso</h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Brand Buttons -->
                            <div class="card shadow">
                                <div class="card-header py-3">
                                <?php
                                $Read = new Read();
                                $Read->FullRead("SELECT mc.*, c.curso_titulo, c.curso_descricao
                                    FROM matriculas_cursos mc
                                    LEFT JOIN cursos c ON c.curso_id = mc.curso_id
                                    WHERE mc.curso_id = :ci", "ci={$courseId}");
                                if($Read->getResult()) {
                                    $DataCourse = $Read->getResult()[0];
                                        ?>
                                    <h6 class="m-0 font-weight-bold text-primary"><?= $DataCourse['curso_titulo'] ?></h6>
                                    <?php
                                } else {
                                    die(Error('Curso não encontrado!', 'warning'));
                                }
                                ?>

                                </div>
                                <div class="card-body">
                                    <a href="<?= BASE ?>/painel/profile/courses/lesson" class="btn btn-danger btn-block"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                    </button>
                </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">Nome da aula</div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Collapsible Group Item #2
                    </button>
                </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Collapsible Group Item #3
                    </button>
                </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
                </div>
            </div>
        </div>
        
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Unitplus <?= date('Y') ?></span>
                </div>
            </div>
        </footer>

        <!-- Logout Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title btn btn-success mb-2 vw-100" id="exampleModalLabel">Pronto para sair?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecione "Sair" para encerrar a sua sessão.</div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-dark" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-success" href="<?= BASE ?>/pages/logout">Sair</a>
                    </div>
                </div>
            </div>      
        </div>


        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

        <!-- <script src="<?= BASE ?>/res/site/js/jquery.min.js"></script> -->
        <script src="<?= BASE ?>/res/site/js/bootstrap.bundle.min.js"></script>
        <script src="<?= BASE ?>/res/site/js/jquery.easing.min.js"></script>
        <script src="<?= BASE ?>/res/site/js/sb-admin-2.min.js"></script>

        <script type="text/javascript">
        $(function() {
            $('#form1').submit(function(e) {
                e.preventDefault();

                var comment = $('#comment').val();
             
                $.ajax({
                    url: '<?= BASE ?>/api?route=comments&action=create',
                    type: 'POST',
                    data: { comment: comment, action: 'add_comment'},
                    dataType: 'json',
                    }).done(function(result) {
                        console.log(result);
                    }).fail(function(data) {
                        console.log(data);
                    });
                return false;
            });
        });
        </script>


     
    </body>
</html>