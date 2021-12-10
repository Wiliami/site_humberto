<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getMenuAndSideBarDashboard2();
?>
 

    <form>
        <h1 style="margin-left: 30px;">Meus dados</h1>
        <div class="form-group row" style="margin-left: 20px;">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?= $_SESSION['login'] ['user_name'] ?>" id="inputPassword">
            </div>
        </div>
        <div class="form-group row" style="margin-left: 20px;">
            <label for="inputPassword" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?= $_SESSION['login'] ['user_email'] ?>" id="inputPassword">     
            </div>
        </div>
        <div class="form-group row" style="margin-left: 20px;">
            <label for="inputPassword" class="col-sm-2 col-form-label">Contato</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword">
            </div>
        </div>
        <input type="submit" class="btn btn-primary mb-2" value="Continuar" style="margin: 30px;">
    </form>
        

        <?php
        
            $Component = new Component();
            echo $Component->getFooterDashboard();
            
        ?>

