<?php
$User = new User();
$User->verifyExistLoginUser();
$User->verifyLevelUserModerator();
$Component = new Component();
echo $Component->getHeadHtmlReset();
?>
    
    <body>     
    <div style="margin-left: 20px;">
        <h3>Olá, <?= $_SESSION['login']['user_name'] ?></h3>
        <span>Cursos</span>
    </div>

    <?php
    $Read = new Read();
    $Read->FullRead("SELECT * FROM cursos");
    if($Read->getResult()) {
        foreach($Read->getResult() as $Updates) {
    ?>
    
    <div class="row gx-5 grid-container" style="margin-left: 8px; margin-top: 20px;">
        <div class="col-lg-4 mb-5">
            <div class="card h-100 shadow border-0">
                <img src="<?= BASE ?>/src/images/page-sobre.jpg" alt="imagem de fundo"/>
                <div class="card-body p-4">
                    <div class="badge bg-success bg-gradient rounded-pill mb-2 text-white"><?= $Updates['curso_categoria'] ?></div>
                    <a class="text-decoration-none link-dark stretched-link" href="<?= BASE ?>/painel/aulas">
                        <h5 class="card-title mb-3"><?= $Updates['curso_titulo'] ?></h5>
                    </a>
                    <p class="card-text mb-0"><?= $Updates['curso_descricao'] ?></p>
    <?php  
        } 
    } else {
        Error("Ainda não existem cursos para atualizar!");
    }
    ?>
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
    <?php
    $Component = new Component();
    echo $Component->getFooterDashboard();
    ?>