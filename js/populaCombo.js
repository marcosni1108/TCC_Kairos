$(document).ready(function(){
	
	$('#endereco').ready(function(){
		
		$.getJSON('../../classes/model/consulta.php?opcao=endereco', function (dados){ 
		
		   if (dados.length > 0){	
			  var option = '<option>Selecione o Endereço</option>';
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
	
	
	$('#endereco').change(function(e){
		var end = $('#endereco').val();
		
		
		$.getJSON('../../classes/model/consulta.php?opcao=cnpj&valor='+end, function (dados){
			
			if (dados){ 	
				var value = '';
				
			  
				   value = dados.cnpj;
			  
				
			}else{
				Reset();
				
			}
			$('#cnpj').val(value)
		})
	})
	
	function Reset(){
		$('#endereco').empty().append('<option>Carregar Endereço</option>>');
		$('#cnpj').val('');
		
	}
});


