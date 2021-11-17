<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página | Esqueci senha</title>
    <link rel="stylesheet" href="<?= BASE ?>/src/css/forgot-password.css" type="text/css">

</head>

<body>
        <div class="container">
        <a href="#" data-target="#pwdModal" data-toggle="modal">Esqueci minha senha!</a>
        </div>

        <!--modal-->
        <div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1 class="text-center">Qual é a minha senha?</h1>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">
                                
                                <p>Se você esqueceu a sua senha siga as instruções abaixo para recuperá-la.</p>
                                    <div class="panel-body">
                                        <fieldset>
                                            <div class="form-group">
                                                <input class="form-control input-lg" placeholder="E-mail" name="email" type="email">
                                            </div>
                                            <input class="btn btn-lg btn-primary btn-block" value="Enviar senha" type="submit">
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                </div>	
            </div>
        </div>
        </div>
        </div>

</body>
</html>


