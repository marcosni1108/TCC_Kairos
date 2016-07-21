
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
          include "../header/header.php";
          include "../include/include_css.php";
        ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <div >
                                    <h1 class="text-center"><?php echo 'Bem vindo(a):' ?> <?php echo $logado ?></h1>
                            </h1>
                            <div class="alert alert-info alert-dismissible fade in text-center" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Ajuda:</strong>
                                Por favor selecione o CNPJ da unidade que esta alocado.<br></div>
                            <div class="form-group col-lg-4 text-center"></div>
                            <div class="form-group col-lg-4 text-center">
                                <div class="input-group">
                                    <select  class="form-control" name="cnpj" id="cnpj" required>
                                        <option value="">Selecione o CNPJ</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button id="add" class="btn btn-success" type="button">OK</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
  include "../include/include_js.php";
?>
<script src="../../js/jsHome/jsHome.js"></script>
</body>
</html>
