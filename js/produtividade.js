


$(document).ready(function () {
    $('#btnCancelar').click(function () {
    $('#cancelar').val('true'); 
    $('form').submit();
});

$('#quantidade').blur(function(e){
//$(teste).click(function(e){
			var qtd = $('#quantidade').val();
                        qtd = parseInt(qtd);
			if(qtd===0){
				alert("Quantidade não pode ser 0");
                               // window.document.getElementById("hora_inicial").value="";
                                $('#quantidade').val("");
			}
		
		
		
		
		})
});