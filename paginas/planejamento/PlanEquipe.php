<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
     //   include "../menu_principal/menu_lateral.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
//        include '../include/include_classes.php';
        
   
        
        ?>   
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <body >
        <meta charset="UTF-8">
        <?php
            session_start();
            $departamento = new departamento(); 
            $funcionario = new funcionario();
            $atividade = new atividade();
            $id = (int)$_SESSION['departamento'];         
            $departamento->setId($id);
            $funcionario->setId($id);
            $resultado = $departamento->find($id);
            $resultadoAtividades = $atividade->findDept($id);
            $qtdfunc = $funcionario->findQtdDept($id);
            $totHoras = $qtdfunc->QtdFunc*10;
        ?>        
        <main class="mdl-layout__content">
           <div class="col-lg-12">
                <form method="post" action="">
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Planejamento de Equipe
                        </h1>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <h4><?php echo '<label for="expdicao">Departamento: '.$resultado->nome.'</label>'; ?></h4>
                            </div>                           
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="data">Data</label>
                                <input type="text" class="form-control" id="datepicker" name="data" placeholder="Data" required>                                                               
                            </div>
                                <div class="form-group col-lg-3">
                                    <label for="qtdFunc">Quantidade de Funcionarios</label>
                                    <input type="text" class="form-control" id="qtdFunc" name="qtdfunc" placeholder="Quantidade" value="<?php  echo $qtdfunc->QtdFunc ?>" required>                                
                                </div> 
                            </div>  
                        <div class="row">
                                <div class="form-group col-lg-3">
                                    <label for="totHora">Total de Horas</label>
                                    <input type="text" class="form-control" id="totHora" name="totHora" value="<?php echo $totHoras; ?>" placeholder="Total de Horas" required>                                
                                </div>                            
                        </div>                       
                        <div class="row"></div>
                        
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <table class='table table-striped' width='100%'>
                                    <thead class="thead-inverse">
                                        <tr >
                                            <th>Atividade</th>
                                            <th>Meta por Hora</th>
                                            <th>Unidade</th>
                                            <th width="250px">Quantidade de Hora Planejada</th>
                                            <th width="250px">Quantidade de Atividades</th>
                                            <th width="250px">Quantidade de Mao de Obra</th>
                                        </tr>
                                    </thead>
                                <?php    
                                foreach ($resultadoAtividades as $key => $value){
                                    echo'<tbody>
                                                <tr>
                                                    <th scope="row">'.$value->nome.'</th> 
                                                    <td>'.$value->meta.'</td>    
                                                    <td>'.$value->unid_med.'</td>
                                                    <td><input type="text" name="totHora" required></td>
                                                    <td><input type="text" name="qtdAtiv" required></td>
                                                    <td><input type="text" name="qtdMo" required></td>
                                                </tr>
                                        </tbody>        
                                        ';
                                                                       
                                };
                                ?>     
                                    <thead class="thead-inverse">
                                    <th colspan="6" style='text-align: center;'>Totais</th>
                                    </thead>    
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><input type="text" name="totalHora" required></td>
                                            <td><input type="text" name="totalAtividade" required></td>
                                            <td><input type="text" name="totalMO" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                            </div>
                            <div class="form-group col-lg-2">
                                <input type="submit" name="cadastrar" class="btn btn-success" value="Confirmar">
                            </div>    
                        </div>
    
                      </div>  
                    </form>
                    </div>
                  
        </main>
    </body>
    <?php include_once '../include/include_js.php'; ?>
</html>
	