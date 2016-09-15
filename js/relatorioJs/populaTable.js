$('#btnPesquisar').click(function(){
     document.getElementById('corpo').innerHTML = ' ';
     var departamento = window.document.getElementById("cmbDepartamento").value;
     var atividade = window.document.getElementById("cmbAtividade").value;
     var jsonAmostra = "";
     
 
        $.ajax({ 
                   type: "GET",
                   dataType: "json",
                   async: false,
                  url: "../../classes/model/consulta.php?opcao=FindAllAmostras&valor="+departamento+"&tipo="+atividade,
                   success: function(data){        
                      
                      jsonAmostra = data;
                   }
               });
               if(jsonAmostra.length < 1)
               {
                   alert("Não existem amostras para esta atividade.");
                   window.location='./relatorioAmostra.php';
               }else{               
               var cols = '';
               for(var i=0; i <= jsonAmostra.length; i++ ){
                      
                      cols = '<tr><td>'+jsonAmostra[i].horainicial+'</td>';
                      cols += '<td>'+jsonAmostra[i].horafinal+'</td>';
                      cols += '<td>'+jsonAmostra[i].quantidade+'</td>';
                      cols += '<td>'+jsonAmostra[i].indice+'</td>';
                      document.getElementById('corpo').innerHTML += cols;
                      document.getElementById('corpo').innerHTML += '</tr>';
                  }
              }  
   		
})

