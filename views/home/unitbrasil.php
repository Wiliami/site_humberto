    <?php 
    $Component = new Component();
    echo $Component->getHeadHtmlHome();
    echo $Component->getMenu();
    ?>
    <header>
        <div class="page-header min-vh-100" style="background-image: url('<?= BASE ?>/assets/images/unitbrasil-background.jpeg')" loading="lazy">
            <span class="mask bg-gradient-secondary opacity-4"></span>
            <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 d-flex justify-content-center flex-column">
                    <h1 class="display-5 fw-bolder text-white mb-2">Educação Institucional</h1>
                    <p class="lead text-white mt-3">Descubra um mundo de facilidades ao <br/>estudar no exterior.</p>
                <div class="buttons">
                    <a class="btn btn-info btn-lg px-4 me-sm-3" href="https://www.youtube.com/watch?v=NgO_nA1mlvU">visitar Unitbrasil</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </header>
    <section class="py-sm-7 py-5 position-relative">
        <div class="container">
            <div class="row">
            <div class="col-12 mx-auto">
                <div class="mt-n8 mt-md-n9 text-center">
                <img class="avatar avatar-xxl position-relative z-index-2" src="<?= BASE ?>/src/images/icon_small.png" alt="humberto" loading="lazy">
                </div>
                <div class="row py-5">
                <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="mb-0">A Unitbrasil</h3>
                    </div>
                    <p class="text-lg mb-0">
                        <h5>Sobre a Unitbrasil</h5>
                        A UNIT Brasil tem a missão de proporcionar aos seus alunos a oportunidade de desenvolver ao máximo o seu potencial, criando oportunidades para o mercado e formando pessoas capazes de liderarem e fazerem o diferencial na sociedade contemporânea. Com uma base muito sólida de docentes, a UNIT Brasil deve permitir que seus alunos desenvolvam suas habilidades transformando-os em profissionais competentes de sucesso; Comprometendo-se com a cidadania, ética e o conhecimento para atender as necessidades globais através do ensino eficaz e estrututra educacional diferenciada.<br>
                    </p>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/NqS42PgzG00" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
<?= $Component->getFooterHome(); ?>