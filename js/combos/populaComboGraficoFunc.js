$(document).ready(function(){
        $('#cmbfuncionario').ready(function(){
		//chama o serviço que consulta os funcionarios.
                
		$.getJSON('../../classes/model/consulta.php?opcao=FindFunc', function (dados){ 
		//verifica o json e cria um options.
		   if (dados.length > 0){	
			  var option = '<option value="">Selecione o Funcionário</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
			  })
			 
		   }else{
			  Reset();
			
		   }
		   $('#cmbfuncionario').html(option).show();
                   
                  
		})
	})
        
        });