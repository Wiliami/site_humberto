<?php
$Component = new Component();
echo $Component->getHeadHtmlHome();
echo $Component->getMenu();
?>
<section class="py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6" >
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-black mb-2">Pr. Humberto Oliveira</h1>
                    <p class="lead fw-normal text-black-50 mb-4">Além de ser Empresário e Professor, Pr. Humberto Oliveira dedica também parte do seu tempo para o evangelismo e ministério pastoral.</p>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a class="btn btn-outline-primary btn-lg px-4" href="https://www.facebook.com/educacaoetreinamentos/">Facebook</a>
                    <a class="btn btn-outline-danger btn-lg px-4" href="https://instagram.com/humberto.olliveira?utm_medium=copy_link">Instagram</a>
                </div>
            </div>
        </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                <img class="img-fluid rounded-3 my-5 bg-warning rounded-circle w-290 h-290" src="<?= BASE ?>/assets/images/humberto.png" alt="image de Humberto Oliveira" />
            </div>
        </div>
    </div>
</section>
<?= $Component->getFooterHome(); ?>