$(document).ready(function(){
	
	$('#endereco').ready(function(){
	//pagina de cadastro de departamento	
		$.getJSON('../../classes/model/consulta.php?opcao=endereco', function (dados){ 
		
		   if (dados.length > 0){	
			 var option = '<option value="">Selecione o Endereço</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.endereco+" Nº: "+obj.numero+'</option>';
			  })
			 
		   }else{
			  Reset();
			
		   }
		   $('#endereco').html(option).show(); 
                  $('#cnpj').val('');
		})
	})
        
        
	//pagina de departamento quando o endereço mudar o CNPJ tambem muda
	$('#endereco').change(function(e){
		var end = $('#endereco').val();
		$('#btnCadastrar').prop("disabled",true);
		
		$.getJSON('../../classes/model/consulta.php?opcao=cnpj&tipo=endereco&valor='+end, function (dados){
			
			if (dados){ 	
				var value = '';
				
			  
				   value = dados.cnpj;
			  
				
			}else{
				Reset();
				
			}
			$('#cnpj').val(value);
                        $('#btnCadastrar').prop("disabled",false);
		})
	})
             //pagina de cadastro de atividades
             //Popula combos
	$('#cmbDepartamento').ready(function(){
		
		$.getJSON('../../classes/model/consulta.php?opcao=departamento', function (dados){ 
		
		   if (dados.length > 0){	
			  var option = '<option value="">Selecione o Departamento</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
			  })
			 
		   }else{
			  Reset();
			
		   }
                   //Popula combo
		   $('#cmbDepartamento').html(option).show(); 
                   //zera CNPJ
                  $('#cnpj').val('');
		})
	})
        //pagina de cadastro de atividades
	$('#cmbDepartamento').change(function(e){
		var end = $('#cmbDepartamento').val();
		
		$('#btnCadastrar').prop("disabled",true);
		$.getJSON('../../classes/model/consulta.php?opcao=cnpj&tipo=atividade&valor='+end, function (dados){
			
			if (dados){ 	
				var value = '';
                                value = dados.cnpj;
                       
			}else{
				Reset();
				
			}
			$('#cnpj').val(value)
                       $('#btnCadastrar').prop("disabled",false);
                            
		})
                        
		})
                //pagina de editar departamento
//                $('#enderecoEdit').ready(function(){
//                    
//                    $('#btnCadastrar').prop("disabled",true);
//                    $('#enderecoEdit').attr("readonly",true);
//                    $.getJSON('../../classes/model/consulta.php?opcao=endereco', function (dados){ 
//		
//                    if (dados.length > 0){	
//
//                           $.each(dados, function(i, obj){
//                                  // option += '<option value="'+obj.id+'">'+obj.endereco+" Nº: "+obj.numero+'</option>';
//                                  $('#enderecoEdit').append('<option value="'+obj.id+'">'+obj.endereco+" Nº: "+obj.numero+'</option>');
//
//                           })
//			 
//                    }else{
//                           Reset();
//
//                    }
//                        $('#enderecoEdit').attr("readonly",false);
//                        $('#btnCadastrar').prop("disabled",false);
//		   //$('#enderecoEdit').append(new Option(option)); 
//                 
//		})
//	})
//        
        $('#enderecoEdit').change(function(e){
		var end = $('#enderecoEdit').val();
		$('#btnCadastrar').prop("disabled",true);
		
		$.getJSON('../../classes/model/consulta.php?opcao=cnpj&tipo=endereco&valor='+end, function (dados){
			
			if (dados){ 	
				var value = '';
				
			  
				   value = dados.cnpj;
			  
				
			}else{
				Reset();
				
			}
			$('#cnpjEdit').val(value);
                        $('#btnCadastrar').prop("disabled",false);
		})
	})
        
        //Popula combo de lider e gerentes pagina de editar departamentos
        
             $('#lider').ready(function(){
                    
                    $('#btnCadastrar').prop("disabled",true);
                    $('#enderecoEdit').attr("readonly",true);
                    $.getJSON('../../classes/model/consulta.php?opcao=user&valor=lider', function (dados){ 
		
                    if (dados.length > 0){	
                           
                           $.each(dados, function(i, obj){
                                  // option += '<option value="'+obj.id+'">'+obj.endereco+" Nº: "+obj.numero+'</option>';
                                  $('#lider').append('<option value="'+obj.id+'">'+obj.nome+'</option>');

                           })
			 
                    }else{
                           Reset();

                    }
                   
                        $('#enderecoEdit').attr("readonly",false);
                        $('#btnCadastrar').prop("disabled",false);
		   //$('#enderecoEdit').append(new Option(option)); 
                 
		})
	})
         $('#gerente').ready(function(){
                    
                    $('#btnCadastrar').prop("disabled",true);
                    $('#enderecoEdit').attr("readonly",true);
                    $.getJSON('../../classes/model/consulta.php?opcao=user&valor=Gerente', function (dados){ 
		
                    if (dados.length > 0){	

                           $.each(dados, function(i, obj){
                                  // option += '<option value="'+obj.id+'">'+obj.endereco+" Nº: "+obj.numero+'</option>';
                                  $('#gerente').append('<option value="'+obj.id+'">'+obj.nome+'</option>');

                           })
			 
                    }else{
                           Reset();

                    }
                     
                        $('#enderecoEdit').attr("readonly",false);
                        $('#btnCadastrar').prop("disabled",false);
		   //$('#enderecoEdit').append(new Option(option)); 
                  
                 
		});
	})
        //como para mudar o cpnj quando o depatamento mudar
        $('#departamentoEditAtividade').change(function(e){
		var end = $('#departamentoEditAtividade').val();
		
		$('#btnCadastrar').prop("disabled",true);
		$.getJSON('../../classes/model/consulta.php?opcao=cnpj&tipo=atividade&valor='+end, function (dados){
			
			if (dados){ 	
				var value = '';
                                value = dados.cnpj;
                       
			}else{
				Reset();
				
			}
			$('#cnpjEditAtividade').val(value)
                       $('#btnCadastrar').prop("disabled",false);
                            
		})
                        
		})
                
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
         
	function Reset(){
		$('#cnpj').val('');
               // $('#cmbDepartamento').empty().append('<option>Carregar Departamento</option>');
//                if(tipo==='atividade'){
//                    alert("Departamento sem Atividades");
//                    location.href='cadastroAmostra.php'; 
//                     $('#cmbAtividade').empty().append('<option>Carregar Endereço</option>>');
//                    
//                    
//                }
               
		
	}
});


