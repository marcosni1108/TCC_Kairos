<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        ?>   
        <script type="text/javascript" src="../../js/validadores.js"></script>
    </head>
    <body >
        <meta charset="UTF-8">
        <?php
        
            session_start();
            $departamento = new Departamento(); 
            $funcionario = new Funcionario();
            $atividade = new Atividade();
            $id = (int)$_SESSION['departamento'];         
            $departamento->setId($id);
            $resultado = $departamento->find($id);
            $resultadoAtividades = $atividade->findDept($id);
            $qtdAtividade = $atividade->findQtdAtiv($id);
            $qtdfunc = $funcionario->findQtdDept($id);
            $totHoras = $qtdfunc->QtdFunc*10;
            $qtdHora = 0;
            $qtdAtiv = 0;
            $qtdMO = 0;        
        
        if (isset($_POST['cadastrar'])){
            
                    foreach ($resultadoAtividades as $key => $value){
                        $i++;
                        $qtd_hora_planejada = $_POST['qtdHora_'.$value->id];
                        $qtd_ativididades = $_POST['qtdAtiv_'.$value->id];
                        $qtd_MO = $_POST['qtdMO_'.$value->id];
                        $id_atividade_fk = $value->id;
                        $planejamento = new Planejamento();
                        $planejamento->setQtd_hora_planejada($qtd_hora_planejada);
                        $planejamento->setQtd_atividades($qtd_ativididades);
                        $planejamento->setMao_de_obra($qtd_MO);
                        $planejamento->setId_atividade_fk($id_atividade_fk);
                        $insert = $planejamento->insert();

                            }
            
            # Insert
            if ($insert==="OK") {
                echo  "<script> alert('Planejamento cadastrado com sucesso.')</script>";
                
            }else{
                
                echo  "<script> alert('{$insert} ')</script>";
                
            }
        }      
            
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
                                <label for="data">Data</label></br>
                                <span id="data" name="data"><?php echo date("d/m/Y");?></span>                                                                 
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
                            <div class="form-group col-lg-12 table-responsive">
                                <table class='table table-striped' width='100%'>
                                    <thead class="thead-inverse">
                                        <tr >
                                            <th>Id</th>
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
                                    $qtdHora++;
                                    $qtdAtiv++;
                                    $qtdMO++;
                                    echo'<tbody>
                                                <tr>
                                                    <th scope="row">'.$value->id.'</th>
                                                    <th scope="row">'.$value->nome.'</th> 
                                                    <td>'.$value->meta.'</td>    
                                                    <td>'.$value->unid_med.'</td>
                                                    <td><input id="qtdHora_'.$value->id.'" value="0" class="qtdHota" onblur="calcHora()" type="text" name="qtdHora_'.$value->id.'" required></td>
                                                    <td><input id="qtdAtiv_'.$value->id.'" value="0" class="qtdAtiv" onblur="calcAtiv()" type="text" name="qtdAtiv_'.$value->id.'" required></td>
                                                    <td><input id="qtdMO_'.$value->id.'" value="0" class="qtdMo" onblur="calcMO()" type="text" name="qtdMO_'.$value->id.'" required></td>
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
                                            <td></td>
                                            <td><input type="text" name="totalHora" id="totalHora" required></td>
                                            <td><input type="text" name="totalAtividade" id="totalAtividade" required></td>
                                            <td><input type="text" name="totalMO" id="totalMO" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                            </div>
                            <div class="form-group col-lg-2 text-center">
                                <input type="submit" name="cadastrar" class="btn btn-success" value="Confirmar">
                            </div>    
                        </div>
    
                      </div>  
                    </form>
                    </div>
                  
        </main>
    </body>
    <?php include_once '../include/include_js.php'; ?>
    <script>
    function calcHora() {
    console.log("teste");
    var total = 0;
    var i = 0;
    $('.qtdHota').each(function() {
        
         total += + $('.qtdHota')[i].value;
          
          i++;
    });
    $('#totalHora').val(total);
}

function calcAtiv() {
    console.log("teste");
    var total = 0;
    var i = 0;
    $('.qtdAtiv').each(function() {
        
         total += + $('.qtdAtiv')[i].value;
          
          i++;
    });
    $('#totalAtividade').val(total);
}

function calcMO() {
    console.log("teste");
    var total = 0;
    var i = 0;
    $('.qtdMo').each(function() {
        
         total += + $('.qtdMo')[i].value;
          
          i++;
    });
    $('#totalMO').val(total);
}
    </script>
    
</html>
