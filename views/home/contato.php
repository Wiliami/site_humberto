
<?php
$Component = new Component();
echo $Component->getHeadHtmlHome();
echo $Component->getMenu();
?>
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
                                    <span class="text-sm opacity-8">contato@unitbrasil.com.br</span>
                                </div>
                                </div>
                                <div class="d-flex p-2 text-white">
                                <div>
                                    <i class="fas fa-map-marker-alt text-sm"></i>
                                </div>
                                <div class="ps-3">
                                    <span class="text-sm opacity-8">Manaus, AM 69058-090</span>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
            </div>
        </div>
        </div>
</section>
<?php
$Component = new Component();
echo $Component->getFooterHome();
?>
    </body>
</html>