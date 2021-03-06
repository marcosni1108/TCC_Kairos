//carrega todos os cnpj
        $('#cnpj').ready(function(){
		//chama o serviço que consulta os departamentos.
                $('#btnIniciar').prop("disabled",true);
		$.getJSON('../../classes/model/consulta.php?opcao=allCNPJ', function (dados){ 
		//verifica o json e cria um options.
		   if (dados.length > 0){	
			  var option = '<option value="">Selecione a Filial</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.nomeFilial+'</option>';
			  })
			 
		   }else{
			  Reset();
			
		   }
		   $('#cnpj').html(option).show();
                    $('#btnIniciar').prop("disabled",false);
                  
		})
	})
        
// popula o combo de departamentos quando a pagina é carregada.
	$('#cnpj').change(function(e){
            $('#btnIniciar').prop("disabled",true);
            var idCNPJ = $('#cnpj').val();
		//chama o serviço que consulta os departamentos.
		$.getJSON('../../classes/model/consulta.php?opcao=FindDeptCnpj&valor='+idCNPJ, function (dados){ 
		//verifica o json e cria um options.
		   if (dados.length > 0){	
			  var option = '<option value="">Selecione o Departamento</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
			  })
			 
		   }else{
			  Reset("Dept");
			
		   }
		   $('#cmbDepartamento').html(option).show(); 
                  $('#btnIniciar').prop("disabled",false);
		})
	})
        
        //quando é alterado o departamento
	$('#cmbDepartamento').change(function(e){
		var end = $('#cmbDepartamento').val();
		
                //desabilita o botão cadastrar até que o combos serem populados.
		$('#btnCadastrar').prop("disabled",true);
                //chama o serviço que traz o cpnj do departamento.
	
                        //chama o serviço que lista as atividades relacionadas ao departamento.
                        $.getJSON('../../classes/model/consulta.php?opcao=AtividadeMeta&valor='+end, function (dados1){
			
                         if (dados1.length > 0){	
                            var option = '<option value="">Selecione o Atividade</option>';
                            $.each(dados1, function(i, obj){
                                    option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
                            })
                        }
                        else{
				Reset("atividade");
				
			}
			//popula o combo de atividades.
                          $('#cmbAtividade').html(option).show(); 
                          
                          //habilita o botão cadastrar.
                          $('#btnIniciar').prop("disabled",false);
		})
                        
		
	})
        
$('#turno').ready(function(){
		//chama o serviço que consulta os departamentos.
                
		$.getJSON('../../classes/model/consulta.php?opcao=turno', function (dados){ 
		//verifica o json e cria um options.
		   if (dados.length > 0){	
			  var option = '<option value="">Selecione o turno</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.HoraInicial+'</option>';
			  })
			 
		   }else{
			  Reset();
			
		   }
		   $('#turno').html(option).show();
                   
                  
		})
	})
        
        
	function Reset(tipo){
		$('#endereco').empty().append('<option>Carregar Endereço</option>>');
		$('#cnpj').val('');
                $('#cmbDepartamento').empty().append('<option>Carregar Departamento</option>>');
                if(tipo==='atividade'){
                    alert("Departamento sem Atividades");
                    location.href='ProdutividadeAtiv.php'; 
                     $('#cmbAtividade').empty().append('<option>Carregar Atividades</option>>');                                                    
                 }
                if(tipo==='Dept'){
                    alert("Filial sem departamento");
                    $('#cnpj').val('');
                    $('#cmbDepartamento').empty().append('<option>Carregar Departamento</option>>');                                               
                 }
               
		
	}



