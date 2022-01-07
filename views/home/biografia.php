<?php
$Component = new Component();
echo $Component->getHeadHtmlHome();
echo $Component->getMenu();
?>
<body class="blog-author bg-gray-200">
    <header>
        <div class="page-header min-height-400" style="background-image: url('<?= BASE ?>/')" loading="lazy">
            <span class="mask bg-gradient-secondary opacity-4"></span>
        </div>
    </header>
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
        <section class="py-sm-7 py-5 position-relative">
        <div class="container">
            <div class="row">
            <div class="col-12 mx-auto">
                <div class="mt-n8 mt-md-n9 text-center">
                <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="<?= BASE ?>/src/images/humberto.png" alt="humberto" loading="lazy">
                </div>
                <div class="row py-5">
                <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="mb-0">Humberto Oliveira</h3>
                    <div class="d-block">
                        <a href="https://www.facebook.com/educacaoetreinamentos/" type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Siga-me</a>
                    </div>
                    </div>
                    <div class="row mb-4">
                    <div class="col-auto">
                        <span class="h6">323</span>
                        <span>Postagens</span>
                    </div>
                    <div class="col-auto">
                        <span class="h6">3.5k</span>
                        <span>Seguidores</span>
                    </div>
                    <div class="col-auto">
                        <span class="h6">260</span>
                        <span>Seguindo</span>
                    </div>
                    </div>
                    <p class="text-lg mb-0">
                    Em breve aqui será a biografia do Humberto
                    </a>
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
    <section class="py-lg-5">
        <div class="container">
        <div class="row">
            <div class="col">
            <div class="card box-shadow-xl overflow-hidden mb-5">
                <div class="row">
                <div class="col-lg-5 position-relative bg-cover px-0" style="background-image: url('../assets/img/examples/blog2.jpg')" loading="lazy">
                    <div class="z-index-2 text-center d-flex h-100 w-100 d-flex m-auto justify-content-center">
                    <div class="mask bg-gradient-danger opacity-8"></div>
                    <div class="p-5 ps-sm-8 position-relative text-start my-auto z-index-2">
                        <h3 class="text-white">Informação de contato</h3>
                        <!-- <p class="text-white opacity-8 mb-4">Preencha o formulário e nossa equipe irá entrar em contato com você em atualizações em até 24h.</p> -->
                        <div class="d-flex p-2 text-white">
                        <div>
                            <i class="fas fa-phone text-sm"></i>
                        </div>
                        <div class="ps-3">
                            <span class="text-sm opacity-8">(92) 99999-9999</span>
                        </div>
                        </div>
                        <div class="d-flex p-2 text-white">
                        <div>
                            <i class="fas fa-envelope text-sm"></i>
                        </div>
                        <div class="ps-3">
                            <span class="text-sm opacity-8">humberto@contato.com</span>
                        </div>
                        </div>
                        <div class="d-flex p-2 text-white">
                        <div>
                            <i class="fas fa-map-marker-alt text-sm"></i>
                        </div>
                        <div class="ps-3">
                            <span class="text-sm opacity-8">Manaus, AM 00000-000</span>
                        </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                <!-- <div class="col-lg-7">
                    <form class="p-3" id="contact-form" method="post">
                    <div class="card-header px-4 py-sm-5 py-3">
                        <h2>Diga olá!</h2>
                        <p class="lead"> Gostaríamos de conversar com você.</p>
                    </div>
                    <div class="card-body pt-1">
                        <div class="row">
                        <div class="col-md-12 pe-2 mb-3">
                            <div class="input-group input-group-static mb-4">
                            <label>Meu nome é</label>
                            <input type="text" class="form-control" placeholder="Nome completo">
                            </div>
                        </div>
                        <div class="col-md-12 pe-2 mb-3">
                            <div class="input-group input-group-static mb-4">
                            <label>Estou procurando por</label>
                            <input type="text" class="form-control" placeholder="O que você ama">
                            </div>
                        </div>
                        <div class="col-md-12 pe-2 mb-3">
                            <div class="input-group input-group-static mb-4">
                            <label>Sua mensagem</label>
                            <textarea name="message" class="form-control" id="message" rows="6" placeholder="O que eu quero dizer"></textarea>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6 text-end ms-auto">
                            <button type="submit" class="btn bg-gradient-info mb-0">Enviar mensagem</button>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div> -->
    </section>
<?= $Component->getFooterHome(); ?>