
         $('#cmbfuncionario').ready(function(){
                //Combo de funcionarios	
                $('#btnGerar').prop("disabled",true);
               
		$.getJSON('../../classes/model/consulta.php?opcao=FindFunc', function (dados){ 
		
		   if (dados.length > 0){	
			 var option = '<option value="">Selecione o funcionário</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
			  })
			 
                    }
		 $('#cmbfuncionario').html(option).show(); 
                   $('#btnGerar').prop("disabled",false);
		})
	})
         

        $('#cmbCNPJ').ready(function(){
	//pagina de cadastro de departamento	
		$.getJSON('../../classes/model/consulta.php?opcao=endereco', function (dados){ 
		
		   if (dados.length > 0){	
			 var option = '<option value="">Selecione o CNPJ</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.cnpj+'</option>';
			  })
			 
		   }else{
			  Reset();
			
		   }
		   $('#cmbCNPJ').html(option).show(); 
                  
		})
	})
        



