$(document).ready(function(){
	
	$('#hora_inicial').wickedpicker({now: '8:00', twentyFour: true, title:
                    'Horário', showSeconds: false});
        $('#hora_final').wickedpicker({now: '8:00', twentyFour: true, title:
                    'Horário', showSeconds: false});
	})
 $('#document').ready(function(){
     var qtdAmostra = document.getElementById("qtdAmostra").innerHTML
     var jsonAmostra = "";
   for(var i =0; i <= qtdAmostra-1; i++){  
        $.ajax({ 
                   type: "GET",
                   dataType: "json",
                   async: false,
                   url: "http://localhost/Kairos/js/dataAmostra/dataAmostra"+i+".json",
                   success: function(data){        
                      
                      jsonAmostra = data;
                   }
               });
               
                      var hora_inicial = new Date(jsonAmostra.amostra[0].hora_inicial*1000);
                      var hours = hora_inicial.getHours();
                      var cols = '';
                      cols += '<td>'+jsonAmostra.amostra[0].hora_inicial_1+'</td>';
                      cols += '<td>'+jsonAmostra.amostra[0].hora_final_1+'</td>';
                      cols += '<td>'+jsonAmostra.amostra[0].quantidade+'</td>';
                      document.getElementById('tbl_Amostra').innerHTML += cols;
                      document.getElementById('tbl_Amostra').innerHTML += '</tr>';
		
   }		
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