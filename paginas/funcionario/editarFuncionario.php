

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
         if (isset($_POST['cadastrar'])){
             
             $matricula = $_POST['matricula'];
             $nome = $_POST['nome'];
             $cpf = $_POST['cpf'];
             $email = $_POST['email'];
             $login = $_POST['login'];
             $senha = 'kairos';
             $nivel = $_POST['nivel'];
             $idDepartamentoFK = $_POST['departamento'];
             $funcionario = new Funcionario();
             $funcionario->setMatricula($matricula);
             $funcionario->setNome($nome);
             $funcionario->setCpf($cpf);
             $funcionario->setEmail($email);
             $funcionario->setLogin($login);
             $funcionario->setSenha(md5($senha));
             $funcionario->setNivel($nivel);
             $funcionario->setStatus("A");
             $funcionario->setIdDepartamentoFk($idDepartamentoFK);
             $insert = $funcionario->insert();
             # Insert
             if ($insert==="OK") {
                 echo  "<script> alert('Funcionário cadastrado com sucesso.')</script>";
                 
             }else{
                 
                 echo  "<script> alert('{$insert}')</script>";
                 
             }
             
         }
         
         
         ?> 
      <main class="mdl-layout__content">
         <div class="col-lg-12">
			 <form method="post" action="">
				<div class="input-prepend">
				   <div class="row" >
					  <h1 class="page-header text-center">
						 Cadastro de Funcionário
					  </h1>
				   </div>
				   <div class="row">
					  <div class="col-lg-12">
						 <div class="panel panel-default">
							<!-- Conteudo dentro de wrapper -->
							<div class="panel-body">
							   <div class="form-group col-lg-4">
								  <label for="matricula">Matricula</label>
								  <input type="text" class="form-control" id="matricula" onkeypress="javascript: mascara(this, soNumeros);" maxlength="11" name="matricula" placeholder="Matricula" required>
							   </div>
							   <div class="form-group col-lg-4">
								  <label for="nome">Nome</label>
								  <input type="text" class="form-control" name="nome" id="nome" onkeypress="javascript: mascara(this, soLetras);" placeholder="Nome" required>
							   </div>
							   <div class="form-group col-lg-4">
								  <label for="cpf">CPF</label>
								  <input type="text" class="form-control" name="cpf" id="cpf" onblur="javascript: validarCPF(this.value);" onkeypress="javascript: mascara(this, cpf_mask);"  maxlength="14" placeholder="CPF" required>
							   </div>
							   <div class="row">
								  <div class="form-group col-lg-4">
									 <label for="email">E-mail</label>
									 <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required="true">
								  </div>
								  <div class="form-group col-lg-4">
									 <label for="nivel">Nivel</label>
									 <select type="nivel" class="form-control" name="nivel" id="nivel">
										<option value="Administrador">Administrador</option>
										<option value="Gerente">Gerente</option>
										<option value="Lider">Lider</option>
										<option value="Operador">Operador</option>
									 </select>
								  </div>
								  <div class="form-group col-lg-4">
									 <label for="login">Login</label>
									 <input type="text" class="form-control" name="login" id="login" placeholder="Login" required>
								  </div>
								  <div class="form-group col-lg-4">
									 <label for="cnpj">Filial</label>
									 <select  class="form-control" name="cnpj" id="cnpj" required>
										<option value="">Selecione a Filial</option>
									 </select>
								  </div>
								  <div class="form-group col-lg-4">
									 <label for="departamento">Departamento</label>
									 <select  class="form-control" name="departamento" id="cmbDepartamento" required>
										<option value="">Selecione o Departamento</option>
									 </select>
								  </div>
							   </div>
							   <div class="row">
								  <div class="form-group col-lg-4">
								  </div>
								  <div class="form-group col-lg-4 text-center">
									 <input type="submit" name="cadastrar" class="btn btn-success" value="Cadastrar dados">
								  </div>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
				</div> 
			 </form>
		 </div> 
      </main>
   </body>
   <?php include_once '../include/include_js.php'; ?>
   <script src="../../js/populaComboAtividade.js"></script>
</html>
