<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kairos - Mudar Senha</title>
        <?php
       
        include "../include/include_css.php";
        session_start();
//        $login = $_GET[md5('login')];
         $login = $_SESSION['login'];
        include '../include/include_classes.php';
         if (isset($_POST['mudar'])){
            
           
            $senha1 = $_POST['senha1'];
            $senha  =  $_POST['senha'];
            $senhaAntiga =  $_POST['senhaAntiga'];
            
            $funcionario = new Funcionario();
            $result = $funcionario->verificaLogin($login,md5($senhaAntiga));
            //verifica se as senhas estão iguais
            
                if(count($result) == 1){
                if($senha1===$senha){

                     
                     $funcionario->setSenha(md5($senha));
                     if($funcionario->updateSenha($login)){
                        echo "<script type='text/javascript' charset='utf-8'>alert('Senha alterada com sucesso!');"
                                 .  "window.location='./login.php';</script>";
                     }
                }else{
                    echo "<script type='text/javascript' charset='utf-8'>alert('Senhas não conferem!');</script>";
                }

             }else{
                    echo "<script type='text/javascript' charset='utf-8'>alert('Senha antiga não confere!');</script>";
                }
         }
        ?>  

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                                       
                    <div class="login-panel panel panel-default" > 

                        <div class="panel-heading">
                            <h3 class="panel-title">Alterar Senha</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="">
                                <fieldset>
<!--                                    <div class="form-group">
                                        <input class="form-control" placeholder="Login" name="login" type="text" autofocus required>
                                    </div>-->
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Senha Antiga" name="senhaAntiga" type="password" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nova Senha" name="senha" type="password" value="" required>
                                    </div>
                                   <div class="form-group">
                                        <input class="form-control" placeholder="Repita a Senha" name="senha1" type="password" value="" required>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block" name="mudar" value="Mudar"></input>

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
