//carrega todos os cnpj
        $('#cnpj').ready(function(){
		//chama o serviço que consulta os departamentos.
               // $('#btnCadastrar').prop("disabled",true);
		$.getJSON('../../classes/model/consulta.php?opcao=allCNPJ', function (dados){ 
		//verifica o json e cria um options.
		   if (dados.length > 0){	
			  var option = '<option value="">Selecione o CNPJ</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.cnpj+'</option>';
			  })
			 
		   }else{
			  Reset();
			
		   }
		   $('#cnpj').html(option).show();
                    //$('#btnCadastrar').prop("disabled",false);
                  
		})
	})
        
// popula o combo de departamentos quando a pagina é carregada.
	$('#cnpj').change(function(e){
            //$('#img').show();
            $('#btnCadastrar').prop("disabled",true);
            var idCNPJ = $('#cnpj').val();
		//chama o serviço que consulta os departamentos.
		$.getJSON('../../classes/model/consulta.php?opcao=FindDeptCnpj&valor='+idCNPJ, function (dados){ 
		//verifica o json e cria um options.
		   if (dados.length > 0){	
			  var option = '<option value="">Selecione o Departamento</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
			  })
			//  $('#img').hide();
		   }else{
			  Reset("Dept");
			
		   }
		   $('#cmbDepartamento').html(option).show(); 
                  $('#btnCadastrar').prop("disabled",false);
		})
	})
        
        //quando é alterado o departamento
	
$('#cmbDepartamento').change(function(e){
            $('#btnCadastrar').prop("disabled",true);
           // $('#img').show();
            var id = $('#cmbDepartamento').val();
		//chama o serviço que consulta os departamentos.
		$.getJSON('../../classes/model/consulta.php?opcao=BuscaTipoParada&valor='+id, function (dados){ 
		//verifica o json e cria um options.
		   if (dados.length > 0){	
			  var option = '<option value="">Selecione a parada</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.Id+'">'+obj.Nome+'</option>';
			  })
			// $('#img').hide();
		   }else{
			  Reset("Parada");
			
		   }
		   $('#cmbParada').html(option).show(); 
                  $('#btnCadastrar').prop("disabled",false);
		})
	})
        
        
        
	function Reset(tipo){
		$('#endereco').empty().append('<option>Carregar Endereço</option>>');
		$('#cnpj').val('');
                $('#cmbDepartamento').empty().append('<option>Carregar Departamento</option>>');
                if(tipo==='Parada'){
                    alert("Departamento sem paradas");
                    location.href='resgistrarParada.php'; 
                     $('#cmbAtividade').empty().append('<option>Carregar Atividades</option>>');                                                    
                 }
                if(tipo==='Dept'){
                    alert("Filial sem departamento");
                    $('#cnpj').val('');
                    $('#cmbDepartamento').empty().append('<option>Carregar Departamento</option>>');                                               
                 }
               
		
	}
        
                
	$('#tempo_parada').blur(function(e){
           
            var parada = $('#tempo_parada').val();
            parada = parseInt(parada);
		
                if(parada>60){
                    $('#tempo_parada').val("");
                    alert("O tempo da parada não pode passar de 60 minutos.");
                }else if (parada===0){
                    alert("Parada não pode ser 0");
                     $('#tempo_parada').val("");
                }
		
	})
        
     
        
       
