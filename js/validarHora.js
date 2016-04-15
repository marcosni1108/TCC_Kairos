$(document).ready(function(){
	
	$('#hora_inicial').wickedpicker({now: '8:00', twentyFour: true, title:
                    'Horário', showSeconds: false});
        $('#hora_final').wickedpicker({now: '8:00', twentyFour: true, title:
                    'Horário', showSeconds: false});
	})
        

$('#quantidade').focus(function(e){
//$(teste).click(function(e){
			var hora_inicial ="";
			var hora_final ="";
			hora_inicial = window.document.getElementById("hora_inicial").value;
			hora_final = window.document.getElementById("hora_final").value;
			
			if(hora_inicial>=hora_final){
				alert("Horário final não pode ser menor ou igual que o horário inicial");
                               // window.document.getElementById("hora_inicial").value="";
                                window.document.getElementById("hora_final").value="";
			}else{
			
				return;
			}
		
		
		
		
		})
                

                
        function validaHora(){
//$(teste).click(function(e){
			var hora_inicial ="";
			var hora_final ="";
			hora_inicial = window.document.getElementById("hora_inicial").value;
			hora_final = window.document.getElementById("hora_final").value;
			
			if(hora_inicial>=hora_final){
				alert("Horário final não pode ser menor ou igual que o horário inicial");
                               // window.document.getElementById("hora_inicial").value="";
                                window.document.getElementById("hora_final").value="";
                                return false;
			}else{
			
				return true;
			}
		
		
		
		
		}
                function finalizar(){
                    $("#amostra")[0].submit();
                
                }; 