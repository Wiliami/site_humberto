<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
$Username = $_SESSION['login']['user_name'];
$courseId = filter_input(INPUT_GET, 'course', FILTER_VALIDATE_INT);
?>
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="<?= BASE ?>/src/images/icon_small.png" alt="logo unit" class="btn-sm" style="width: 45px; height: 40px;">
            </div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT mc.*, c.curso_titulo, c.curso_descricao
                FROM matriculas_cursos mc
                LEFT JOIN cursos c ON c.curso_id = mc.curso_id
                WHERE mc.curso_id = :ci", "ci={$courseId}");
            if($Read->getResult()) {
                $DataCourse = $Read->getResult()[0];
                    ?>
            <a class="nav-link" href="<?= BASE ?>/painel/profile/courses/meus-cursos">
                <i class="fas fa-book"></i>
                <?= $DataCourse['curso_titulo'] ?>
            </a>    
        <?php
        } else {
            die(Error('Curso não encontrado!', ''));
        }
        ?>
        </li>
        <hr class="sidebar-divider">
        <?php
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
                            <a class="collapse-item" href="#"><?= $Lesson['aula_name'] ?></a>
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
            <div class="container mt-0 w-100">
                <header class="navbar navbar-expand bg-success static-top shadow d-flex align-items-center justify-content-center justify-content-md-between">
                    <ul class="header1" style="list-style: none;">
                        <li>
                            <a href="<?= BASE ?>/painel/aulas/nome-da-aula-anterior" class="small text-gray-200">
                                <div class="fw-normal text-white-50 mb-1">Anterior</div>
                                <i class="fas fa-arrow-circle-left mr-2 text-gray-200"></i>
                                <span>React Native</span>
                            </a>
                        </li>
                    </ul>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <ul class="header2" style="list-style: none;">
                        <li>
                            <a href="<?= BASE ?>/painel/aulas/nome-da-proxima-aula" class="small text-gray-200">
                                <div class="fw-normal text-white-50 mb-1">Próxima</div>
                                <span>React JS</span>
                                <i class="fas fa-arrow-circle-right mr-2 text-gray-200"></i>
                            </a>
                        </li>
                    </ul>
                </header>    
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207"></iframe>
                </div>
                <div class="d-flex flex-row mt-3">
                    <p class="ml-0 h6"><?= $DataCourse['curso_titulo'] ?></p>
                    <i class="fas fa-solid fa-chevron-right ml-2"></i>
                    <p class="ml-2 h6"><?= $DataCourse['curso_descricao'] ?></p>
                </div>
                <h1 class="h3 text-gray-900 mb-4 mt-4"><?= $Lesson['aula_name'] ?></h1>
                <hr>
                <form action="" method="post" id="form1">
                    <!-- // $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    // if(!empty($Post['enviar'])) {
                    //     $CreateComment['comment_text'] = $Post['comment'];
                    //     $Comment = new Comment();
                    //     $Comment->createCommentLesson($CreateComment);
                    //     if($Comment->getResult()) {
                    //         Error($Comment->getError());
                    //     } else {
                    //         Error($Comment->getError(), 'warning');
                    //     }
                    // } 
                    // -->
                    <div class="form-group">
                        <div class="py-3">
                            <h6 class="h4 text-dark">Comentários</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-start">
                                <img class="img-profile rounded-circle" style="width: 40px; height: 40px;" src="<?= BASE ?>/src/images/undraw_profile.svg">
                                <textarea class="form-control mt-3" id="comment" name="comment" placeholder="Escreva seu comentário..." rows="3" required></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" id="submit" form="form1" class="btn btn-danger mt-3 p-2 ml-2" name="enviar" value="Publicar">
                            </div>


                            <?php
                            $Read->FullRead("SELECT c.*, u.user_name
                                FROM comments c
                                LEFT JOIN users u ON u.user_id = c.comment_create_user");
                            if($Read->getResult()) {    
                                $DataComment = $Read->getResult()[0];           
                                    ?>  
                                <div class="d-flex align-items-center justify-content-start">
                                    <img class="img-profile rounded-circle" style="width: 40px; height: 40px;" src="<?= BASE ?>/src/images/undraw_profile.svg">
                                </div>
                                <div class="d-flex flex-column rounded card-body bg-dark mt-3">
                                    <div class="d-flex justify-content-between">
                                        <h1 class="h6"><?= $Username ?></h1>
                                        <span class="btn btn-success btn-sm"><?= $DataComment['comment_aprovacao'] ?></span>
                                    </div>
                                    <span class="h6 text-white"><?= $DataComment['comment_text'] ?></span>
                                <div class="mt-4">
                                    <a href="" class="btn-sm btn-light" title="Editar comentário"><i class="fas fa-edit"></i></a>   
                                    <a href="" class="btn-sm btn-light" title="Excluir comentário"><i class="fas fa-solid fa-trash"></i></a>
                                </div>
                                <?php
                                }
                                ?>
                            </div>  
                    </div>
                </form>
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
                    data: { comentario: comment, action: 'add_comment'},
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