//carrega todos os cnpj
$('#cnpj').ready(function () {
    //chama o serviço que consulta os departamentos.

    $.getJSON('../../classes/model/consulta.php?opcao=allCNPJ', function (dados) {
        //verifica o json e cria um options.
        if (dados.length > 0) {
            var option = '<option value="">Selecione o CNPJ</option>';
            $.each(dados, function (i, obj) {
                option += '<option value="' + obj.id + '">' + obj.cnpj + '</option>';
            })

        } else {
            Reset();

        }
        $('#cnpj').html(option).show();


    })
})

$('#add').click(function (e) {

    var idCNPJ = $('#cnpj').val();
    var CNPJ  = $("#cnpj option:selected").html();
    var acao = "add";
    if(!idCNPJ){
        alert("Escolha um CNPJ");
        return;
    }
    //chama o serviço que consulta os departamentos.
    $.ajax({
        type: "POST",
        url: "../../classes/session/session.php",
        data: {'acao':acao,'idCNPJ': idCNPJ, 'CNPJ':CNPJ}
    }).done(function() {
    alert( "Unidade Salva" );
  })
    
    return false;
})