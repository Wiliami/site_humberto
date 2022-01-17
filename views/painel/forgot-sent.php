<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
echo $Component->getBarraMenuOptions();
?>
<!-- lógica de envio do email de recuperação de senha -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Esqueceu a Senha?</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">E-mail enviado!</h4>
                    <p>Verifique seu e-mail e siga as instruções para recuperar a sua senha.</p>
                </div>                  
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>