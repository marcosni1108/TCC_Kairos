<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        session_start();
        include "../include/include_css.php";

        include '../include/include_classes.php';
        if($_SESSION['erro']==NULL){
            $_SESSION['erro']=false;
        }
        
        ?>  

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php if($_SESSION['erro']== true){ 
                     echo '<div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>ERRO!</strong> Usuario ou Senha invalidos! </div>';
                     $_SESSION['erro']= false;
                    }
                     ?>
                    
                    <div class="login-panel panel panel-default" > 

                        <div class="panel-heading">
                            <h3 class="panel-title">Acessar o Sistema</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="../../classes/model/validaLogin.php">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Login" name="login" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Senha" name="senha" type="password" value="" required>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="lembrar" type="checkbox" value="Lembrar">Lembrar
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Entrar"></input>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php include_once '../include/include_js.php'; ?>
</html>
