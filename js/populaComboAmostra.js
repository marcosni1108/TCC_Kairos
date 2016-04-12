// popula o combo de departamentos quando a pagina é carregada.
	$('#cmbDepartamento').ready(function(){
		//chama o serviço que consulta os departamentos.
		$.getJSON('../../classes/model/consulta.php?opcao=departamento', function (dados){ 
		//verifica o json e cria um options.
		   if (dados.length > 0){	
			  var option = '<option value="">Selecione o Departamento</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
			  })
			 
		   }else{
			  Reset();
			
		   }
		   $('#cmbDepartamento').html(option).show(); 
                  $('#cnpj').val('');
		})
	})
        
        //quando é alterado o departamento
	$('#cmbDepartamento').change(function(e){
		var end = $('#cmbDepartamento').val();
		
                //desabilita o botão cadastrar até que o combos serem populados.
		$('#btnCadastrar').prop("disabled",true);
                //chama o serviço que traz o cpnj do departamento.
		$.getJSON('../../classes/model/consulta.php?opcao=cnpj&tipo=atividade&valor='+end, function (dados){
			
			if (dados){ 	
				var value = '';
                                value = dados.cnpj;
                       
			}else{
				Reset();
				
			}
                        
                        //insere o cnpj no input txt
			$('#cnpj').val(value)
                        
                        //chama o serviço que lista as atividades relacionadas ao departamento.
                        $.getJSON('../../classes/model/consulta.php?opcao=atividade&valor='+end, function (dados1){
			
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
                          $('#btnCadastrar').prop("disabled",false);
		})
                        
		})
	})
        

        
        
	function Reset(tipo){
		$('#endereco').empty().append('<option>Carregar Endereço</option>>');
		$('#cnpj').val('');
                $('#cmbDepartamento').empty().append('<option>Carregar Departamento</option>>');
                if(tipo==='atividade'){
                    alert("Departamento sem Atividades");
                    location.href='cadastroAmostra.php'; 
                     $('#cmbAtividade').empty().append('<option>Carregar Atividades</option>>');                                                    
                 }
               
		
	}



