$(document).ready(function(){
	
		
		$.getJSON('../../classes/model/emprestimoUtil.php?opcao=funcDept&id='+window.end, function (dados){
			if (dados){ 
                            for(var i = 0; i < dados.length; i++) {
                                $("#list1").append('<a href="#" class="list-group-item">'+dados[i].nome+'<input name="'+dados[i].id+'" type="checkbox" class="pull-right"></a>');
                            };
				
                                
			}else{
				Reset();
			}
                        $('#cnpj').html(option).show();
		});
   
});


