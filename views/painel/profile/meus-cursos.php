<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container-fluid">
    <!-- ***Page Heading*** -->
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <h1 class="h3 mb-0 text-gray-800">Olá, <?= $_SESSION['login']['user_name'] ?></h1>
        <p>Meus cursos</p>
    </div>
</div>
<div class="row gx-5 grid-container" style="margin-left: 8px; margin-top: 20px;">
    <div class="col-lg-4 mb-5">
        <div class="card h-100 shadow border-0">
            <img src="<?= BASE ?>/src/images/page-sobre.jpg" alt="imagem de fundo"/>
                <div class="card-body p-4">
                    <div class="badge bg-success bg-gradient rounded-pill mb-2 text-white">Curso</div>
                    <a class="text-decoration-none link-dark stretched-link" href="<?= BASE ?>/painel/aulas">
                        <h5 class="card-title mb-3">Técnicas e Perfomance</h5>
                    </a>
                    <p class="card-text mb-0">Saiba como falar em público e como dominar a timidez na hora
                        de se expressar para as pessoas.
                    </p>
                </div>
            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                <div class="d-flex align-items-end justify-content-between">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                        <div class="small">
                            <div class="fw-bold">unitbrasil</div>
                            <div class="text-muted">March 12, 2021</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-5">
        <div class="card h-100 shadow border-0">
            <img src="<?= BASE ?>/src/images/speech-post.jpg" alt="imagem de fundo"/>
                <div class="card-body p-4">
                    <div class="badge bg-success bg-gradient rounded-pill mb-2 text-white">Curso</div>
                    <a class="text-decoration-none link-dark stretched-link" href="<?= BASE ?>/painel/aulas">
                        <h5 class="card-title mb-3">A Crença e o Mito.</h5>
                    </a>
                    <p class="card-text mb-0">Saiba como falar em público e como dominar a timidez na hora
                        de se expressar para as pessoas.</p>
                </div>
            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                <div class="d-flex align-items-end justify-content-between">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                        <div class="small">
                            <div class="fw-bold">Unitbrasil</div>
                            <div class="text-muted">March 12, 2021</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-5">
        <div class="card h-100 shadow border-0">
        <img src="<?= BASE ?>/src/images/page-youtube.jpg" alt="imagem de fundo"/>
            <div class="card-body p-4">
                <div class="badge bg-success bg-gradient rounded-pill mb-2 text-white">Curso</div>
                <a class="text-decoration-none link-dark stretched-link" href="<?= BASE ?>/painel/aulas">
                <h5 class="card-title mb-3">Expert e Coaching.</h5>
                </a>
                <p class="card-text mb-0">Saiba como falar em público e como dominar a timidez na hora
                    de se expressar para as pessoas.</p>
            </div>
            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                <div class="d-flex align-items-end justify-content-between">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                        <div class="small">
                            <div class="fw-bold">unitbrasil</div>
                            <div class="text-muted">March 12, 2021</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php
echo $Component->getFooterDashboard();
?>
