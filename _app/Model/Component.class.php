<?php
// topo
// - getMenuAndSideBarDashboard - exemplo de menu;
// - 
class Component {
    public function getHeadHtmlHome($title = "Humberto Oliveira") {
        return '
        <!DOCTYPE html>
        <html lang="pt-BR">
            <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>' . $title . '</title>
                <link id="pagestyle" href="' . BASE . '/src/css/material-kit.css?v=3.0.0" rel="stylesheet" />
                <!-- <link rel="stylesheet" href="' . BASE . '/src/css/menu-active.css" type="text/css"> -->
                <!-- Estiliza todos os ícons de deshboard -->
                <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            </head>
    ';
    }
    public function getMenu($Active = 'btn') {
        return "
        <div class=\"container vw-100\">
            <nav class=\"d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3\">
                <a href=' " . BASE . "/' type=\"button\" class=\" nav btn btn-black mb-2 mb-md-0\">
                    <img src='" . BASE . "/src/images/icon_small.png' alt='Logo' style='width: 50px; height: 50px;'>
                </a>
                <ul class=\"nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 text-center\">
                    <li><a href=' " . BASE . "/' class=\"nav-link px-2 link-secondary\">Home</a></li>
                    <li><a href=' " . BASE . "/home/sobre' class=\"nav-link x-2 link-secondary\">Sobre</a></li>
                    <li><a href=' " . BASE . "/home/conteudo' class=\"nav-link px-2 link-secondary\">Conteúdo</a></li>
                    <li><a href='"  . BASE . "/home/unitbrasil' class=\"nav-link px-2 link-secondary\">A Unitbrasil</a></li>
                </ul>
                <div class=\"col-md-auto text-end\">
                    <!-- <a href=' " . BASE . "/pages/cadastro' type=\"button\" class=\"btn me-1 mb-0\">Cadastro</a> -->
                    <!-- <a href=' " . BASE . "/pages/login' type=\"button\" class=\"btn btn-warning w-auto me-1 mb-0\">Área de membros</a> -->
                    <li href='"  . BASE . "/' class=\"nav-link px-2 link-secondary\">...</li>
                </div>   
            </nav>
        </div>
        ";
    }

    public function getHeader() {
        return '
        <header class="bg-white py-5 style="height: 698px;">            
            <div class="overlay"></div>
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
            </video>
            <div class="container h-100">
                 <div class="d-flex h-100 text-center align-items-center">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Plataforma de <br /> evangelismo online <br />e desenvolvimento <br>pesssoal.</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Comece um tour pelo site<br /> e saiba como funciona o <br> evangelismo web.</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <!-- <a class="btn btn-warning btn-lg px-4 me-sm-3" href=" ' . BASE . '/cadastro">Começar</a> -->
                            <a class="btn btn-warning btn-lg px-4" href="#content-overview">Saiba mais</a>
                            <!-- <div class="justify-content-sm-center justify-content-xl-end">
                                <a class="btn btn-success text-black btn-lg px-4" href="/">Suporte</a>
                            </div> -->
                        </div>  
                    </div>
                </div>
            </div>
        </header>
        ';
    }

    public function getFooterHome() {
        return '
            <footer class="footer pt-5 mt-5">
            <div class="container">
                <div class=" row">
                    <div class="col-md-3 mb-4 ms-auto">
                    <div>
                        <!-- <a href=" ' . BASE . '/" type=\"button\" class=\" nav btn btn-black mb-2 mb-md-0\" style="width: 250; height: 100;">
                            <img src="' . BASE . '/src/images/icon_small.png" alt="Logo" style=" width: 50px; height: 50px;">
                        </a> -->
                        <h6 class="font-weight-bolder mb-4">Humberto Oliveira</h6>
                    </div>
                    <div>
                        <ul class="d-flex flex-row ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://www.facebook.com/educacaoetreinamentos/" target="_blank">
                                    <i class="fab fa-facebook text-lg opacity-8"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg" target="_blank">
                                    <i class="fab fa-youtube text-lg opacity-8"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-sm">Parcerias</h6>
                        <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.unitbrasil.com/" target="_blank">
                            UNITBRASIL
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.adventistas.org/pt/" target="_blank">
                            Igreja Adventista
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.unitplus.com.br/" target="_blank">
                            Unitplus
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                    <!-- <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-sm">Recursos</h6>
                        <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link" href="https://iradesign.io/" target="_blank">
                            Fotos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.creative-tim.com/bits" target="_blank">
                            Eventos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.creative-tim.com/affiliates/new" target="_blank">
                            Patron me
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div> -->
                    <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-sm">Ajuda & Suporte</h6>
                        <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link" href="' . BASE . '/home/contato">
                            Entre em contato
                            </a>
                        </li> 
                        </ul>
                    </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
                    <div>
                        <h6 class="text-sm">Legal</h6>
                        <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link" href="' . BASE . '/pages/termos-de-uso">
                            Termos & Condições
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="' . BASE . '/pages/politica-privacidade">
                            Política de privacidade
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="text-center">
                        <p class="text-dark my-4 text-sm font-weight-normal">
                        Desenvolvido por Unitplus | Copyright ' . date('Y') . ' © <a href="https://www.unitplus.com.br/" target="_blank">Unitplus</a>.
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </footer>
      </body>
    </html> 
        ';
    }

    public function getHeadHtmlDashboard($title = 'Plataforma Cursos | Painel') {
        return '
        <!DOCTYPE html>
        <html lang="pt-BR">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content=""> 
                <title>' . $title . '</title>
                <!-- <link href="'. BASE .'/res/site/css/all.min.css" rel="stylesheet" type="text/css">
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
                <link href="'. BASE .'/res/site/css/sb-admin-2.min.css" rel="stylesheet"> --> 
                <link href="'. BASE .'/res/site/css/sb-admin-2.min.css" rel="stylesheet">
                <link href="'. BASE .'/res/site/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
                <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            </head> 
            <body id="page-top">
        ';
    }


    public function getHeadHtmlDataTable() {
        return '
            <!-- Estiliza o dataTables -->
            <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
        ';
    }

    public function getMenuDashboard() {
        return '
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Pesquisar por..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alertas
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">05 de Janeiro de 2022</div>
                                        <span class="font-weight-bold">O curso sobre finanças acaba de ser lançado!</span> 
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">02 de Janeiro de 2022</div>
                                        Novos cursos serão lançados a qualquer momento.
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">07 de Janeiro de 2022</div>
                                        Curso sobre coaching será lançado em breve!!!
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas as
                                    alertas
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Mensagens
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">4 cursos estão sob análise.</div>
                                        <div class="small text-gray-500">Emily Gonçalves · 58 minutos atrás</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Curso sobre gestão financeiro já está disponível com mais
                                            de 12 módulos.</div>
                                        <div class="small text-gray-500">Carlos André · Há um dia</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Foram vendidos 2 cursos nesta semana</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2 dias atrás</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Cursos sobre finanças foram os que tiveram maior acesso
                                            pelo usuários nesta semana.</div>
                                        <div class="small text-gray-500">Alerta do sistema · 2 minutos atrás</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Leia mais mensagens</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Seja bem-vindo(a), 
                                    ' . $_SESSION["login"]["user_name"] . '
                                </span>
                                <img class="img-profile rounded-circle" src="' . BASE . '/src/images/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="' . BASE . '/painel/profile/profile-user">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Minha conta
                                </a>
                                <a class="dropdown-item" href="' . BASE . '/painel/profile/reset-password">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mudar senha
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="' . BASE . '/pages/logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Conteúdo que vai ser exibido na dashboard
                            <div class="container-fluid">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-download fa-sm text-white-50"></i>
                                            Generate Report
                                        </a> 
                                </div>
                                <p>Qualquer conteúdo aqui</p>
                            </div> -->
                <!-- /.container-fluid -->
                <!-- End of Main Content -->
        ';
    }

    public function getMenuDashboardForPageLesson() {
        return '
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Pesquisar por..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alertas
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">05 de Janeiro de 2022</div>
                                            <span class="font-weight-bold">O curso sobre finanças acaba de ser lançado!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">02 de Janeiro de 2022</div>
                                            Novos cursos serão lançados a qualquer momento.
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">07 de Janeiro de 2022</div>
                                            Curso sobre coaching será lançado em breve!!!
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas as
                                        alertas
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <span class="badge badge-danger badge-counter">7</span>
                                </a>
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Mensagens
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">4 cursos estão sob análise.</div>
                                            <div class="small text-gray-500">Emily Gonçalves · 58 minutos atrás</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Curso sobre gestão financeiro já está disponível com mais
                                                de 12 módulos.</div>
                                            <div class="small text-gray-500">Carlos André · Há um dia</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                            <div class="status-indicator bg-warning"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Foram vendidos 2 cursos nesta semana</div>
                                            <div class="small text-gray-500">Morgan Alvarez · 2 dias atrás</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                                alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Cursos sobre finanças foram os que tiveram maior acesso
                                                pelo usuários nesta semana.</div>
                                            <div class="small text-gray-500">Alerta do sistema · 2 minutos atrás</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Leia mais mensagens</a>
                                </div>
                            </li>
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Seja bem-vindo(a), '. $_SESSION["login"]["user_name"] .'</span>
                                    <img class="img-profile rounded-circle" src="' . BASE . '/src/images/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="' . BASE . '/painel/profile/profile-user">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Minha conta
                                    </a>
                                    <a class="dropdown-item" href="' . BASE . '/painel/profile/reset-password">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Mudar senha
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="' . BASE . '/pages/logout" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- Em baixo vem a vídeo aula -->
        ';
    }

    public function getSideBarDashboard() {
        return '
            <!-- Page Wrapper -->
            <div id="wrapper">
                <!-- Sidebar -->
                <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="' . BASE . '/painel/dashboard">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <!-- <i class="fas fa-laugh-wink"></i> -->
                        </div>
                        <!-- <div class="sidebar-brand-text mx-3">Logo</div> -->
                    </a>
                    <!-- Divider -->
                    <!-- Nav Item - Dashboard -->
                    <!-- <li class="nav-item active">
                    <a class="nav-link" href="' . BASE . '/painel/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Painel</span>
                    </a> -->
                            <!-- Sidebar Toggler (Sidebar) 
                    </li>-->
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <!-- Nav Item - Pages Collapse Menu -->
            <!-- Os lis entram aqui -->
        ';
        }


    public function getLiAdministrativoDashboard() {
        if($_SESSION['login']['user_level'] >= 6) {
            return '
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>ADMINISTRATIVO</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Matricular usuário</h6>
                        <a class="collapse-item" href="' . BASE . '/painel/matriculas/cursos/create">
                            <i class="fas fa-folder-plus"></i>
                            No curso
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/matriculas/aulas/create">
                            <i class="fas fa-book"></i>
                            Na aula
                        </a>
                    </div>
                </div>
            </li>
            ';
        }
    } 
    
    // Somente administradores podem ver
    public function getLiPagesDashboard() {
        if($_SESSION['login']['user_level'] >= 6) {
            return '
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-pager"></i>
                    <span>PÁGINAS</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Páginas admin</h6>
                        <a class="collapse-item" href="' . BASE . '/painel/admin/pages/cursos-aprovados">
                            <i class="fas fa-book"></i>
                            Cursos em análise
                            </a>
                        <a class="collapse-item" href="' . BASE . '/painel/admin/pages/historico-compras">
                            <i class="fas fa-history"></i>
                            Histórico de compras
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/admin/pages/settings">
                            <i class="fas fa-cogs"></i>
                            Configurações
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/admin/pages/help">
                            <i class="fas fa-hands-helping"></i>
                            Ajuda
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/admin/pages/suporte">
                            <i class="fas fa-info-circle"></i>
                            Suporte
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/dashboard">
                            <i class="fas fa-pager"></i>
                            Dashboard
                        </a>                      
                    </div>
                </div>
            </li>';
        }
    }  

    public function getLiCoursesDashboard() {
        if($_SESSION['login']['user_level'] <= 2) {
            return '
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
                    aria-controls="collapseUtilities">
                    <i class="fas fa-book"></i>
                    <span>CURSOS</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="' . BASE . '/painel/profile/courses/meus-cursos">
                            <i class="fas fa-book"></i>
                            Meus cursos
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/profile/courses/minhas-compras">
                            <i class="fas fa-money-bill-alt"></i>
                            Minhas compras
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/profile/courses/cursos-finalizados">
                            <i class="fas fa-book"></i>
                            Cursos finalizados
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/profile/courses/cursos-pendentes">
                            <i class="fas fa-book"></i>
                            Cursos pendentes
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/profile/pages/help">
                            <i class="fas fa-hands-helping"></i>
                            Ajuda</a>
                        <a class="collapse-item" href="' . BASE . '/painel/profile/pages/suporte">
                            <i class="fas fa-info-circle"></i>
                            Suporte
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/profile/pages/settings">
                            <i class="fas fa-cogs"></i>
                            Configurações
                        </a>
                        <a class="collapse-item" href="' . BASE . '/painel/dashboard">
                            <i class="fas fa-pager"></i>
                            Dashboard
                        </a>
                    </div>
                </div>
            </li>
            ';
        }
    }

        
        public function getCreatePagesAdmin() {
        if( $_SESSION['login']['user_level'] >= 6) {
            return '
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCreate" aria-expanded="true"
                        aria-controls="collapsePages">
                        <i class="fas fa-folder-plus"></i>
                        <span>CADASTRAR</span>
                    </a>
                    <div id="collapseCreate" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cadastrar</h6>
                            <a class="collapse-item" href="' . BASE . '/painel/admin/users/create">
                                <i class="fas fa-user"></i>
                                Usuário
                            </a>
                            <a class="collapse-item" href="' . BASE . '/painel/admin/level-user/create">
                                <i class="fas fa-user"></i>
                                Nível de usuário
                            </a>
                            <a class="collapse-item" href="' . BASE . '/painel/courses/create">
                                <i class="fas fa-book"></i>
                                Curso
                            </a>
                            <a class="collapse-item" href="' . BASE . '/painel/courses/categorias/create">
                                <i class="fas fa-book"></i>
                                Categoria de curso
                            </a>
                        </div>
                    </div>
                </li>';
            }
        }

    public function getListPagesAdmin() {
        if($_SESSION['login']['user_level'] >= 6) {
        return '
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseList" aria-expanded="true"
                aria-controls="collapsePages">
                <i class="fas fa-check-circle"></i>
                <span>CONSULTAR</span>
            </a>
            <div id="collapseList" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Consultar</h6>
                    <a class="collapse-item" href="' . BASE . '/painel/admin/users/list">
                        <i class="fas fa-user"></i>
                        Usuários
                    </a>
                    <a class="collapse-item" href="' . BASE . '/painel/courses/list">
                        <i class="fas fa-book"></i>
                        Cursos
                    </a>
                    <a class="collapse-item" href="' . BASE . '/painel/matriculas/cursos/list">
                        <i class="fas fa-user"></i>
                        Matrículas cursos
                    </a>
                    <a class="collapse-item" href="' . BASE . '/painel/admin/level-user/list">
                        <i class="fas fa-user"></i>
                        Níveis usuários
                    </a>
                    <a class="collapse-item" href="' . BASE . '/painel/courses/categorias/list">
                        <i class="fas fa-book"></i>
                        Categorias cursos
                    </a>
                </div>
            </div>
        </li>';
        }
    }

    public function getMenuOptionsDashboard() {
        return '
        <div class="container-fluid">
            <div class="row">
                <a href="' . BASE . '/painel/nivel-user" class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Níveis de usuários
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="' . BASE . '/painel/courses/delete" class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Deletar Usuários</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="' . BASE . '/painel/courses/update" class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Alterar
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="' . BASE . '/contato" class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Contato</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        ';
        }

        public function getSuporteDashboard() {
            return '
            <div class="container-fluid">
                <div class="d-sm-flex align-items-end justify-content-end mb-4">
                    <a href="' . BASE . '/profile/suporte"
                        class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                        <i class="far fa-question-circle text-white-50"></i>
                        Ajuda
                    </a>
                </div>
            </div>
        ';
        }

    public function getFooterDashboard() {
        return '
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto" style="font-size: 10px">
                        <span>Copyright &copy; Unitplus 2021-'. date('Y') . '</span>
                    </div>
                </div>
            </footer>
        </div>
        <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!-- Logout Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                        <button class="btn btn-outline-success" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-danger" href="' . BASE . '/pages/logout">Sair</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="'. BASE .'/res/site/js/jquery.min.js"></script>
        <script src="'. BASE .'/res/site/js/bootstrap.bundle.min.js"></script>
        <script src="'. BASE .'/res/site/js/jquery.easing.min.js"></script>
        <script src="'. BASE .'/res/site/js/sb-admin-2.min.js"></script>
        </body>
    </html>';
    }

    public function getLinkScriptFooterDashboard() {
        return '
                <script src="'. BASE .'/res/site/js/jquery.min.js"></script>
                <script src="'. BASE .'/res/site/js/bootstrap.bundle.min.js"></script>
                <script src="'. BASE .'/res/site/js/jquery.easing.min.js"></script>
                <script src="'. BASE .'/res/site/js/sb-admin-2.min.js"></script>
            </body>
        </html>
        ';
    }

    public function getBarraMenuOptions() {
    return '
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Cursos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Palestras</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Revistas
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Contato</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    ';
    }

    public function getSearchDashboard() {
        return '
            <h1>Área de pesquisa de itens</h1>
        ';
    }

    public function getAvatarUser() {
        return '
            <img src="" class="rounded-circle" alt="avatar" style="width: 50px; height: 50px">
        ';
    }

    public function getOpcoes($Users) {
        return '
            <a href="' . BASE . '/painel/courses/list" class="table-link" title="Pesquisar '. $Users['user_name'] .'">
                <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <a href="' . BASE . '/painel/courses/update" class="table-link" title="Alterar nível de ' . $Users['user_name'] .'">
                <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <a href="' . BASE . '/painel/courses/delete" class="table-link danger" title="Excluir ' . $Users['user_name'] .'">
                <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        ';
    }
    public function getConfigDataTable() {
        return '
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <script>
            $(document).ready(function() {
                $("#listar-usuario").DataTable({
                    "language": {
                        "lengthMenu": "Mostrando _MENU_ registros por página",
                        "zeroRecords": "Nenhum resultado foi encontrado",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro disponível",
                        "infoFiltered": "(filtrado de _MAX_ registros no total)"
                    }   
                });
            });
            </script>
            ';
    }

    // bloquear páginas administrativas 
    public function getBlockPageAdmin() {
        if($_SESSION['login']['user_level'] <= 1) {
            header('Location:' . BASE . '/painel/dashboard');
            die();
            return false;
        }
    }

    // bloquear páginas de usuário
    public function getBlockPageProfile() {
        if($_SESSION['login']['user_level'] >= 6) { 
            return header('Location:' . BASE . '/painel/dashboard');
        }
    }
}