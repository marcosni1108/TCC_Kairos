//carrega todos os cnpj
$('#cnpj').ready(function () {
    //chama o serviço que consulta os departamentos.
    // $('#btnCadastrar').prop("disabled",true);
    $.getJSON('../../classes/model/consulta.php?opcao=allCNPJ', function (dados) {
        //verifica o json e cria um options.
        if (dados.length > 0) {
            var option = '<option value="">Selecione a Filial</option>';
            $.each(dados, function (i, obj) {
                option += '<option value="' + obj.id + '">' + obj.nomeFilial + '</option>';
            });
        } else {
            Reset();
        }
        $('#cnpj').html(option).show();
    });
});

// popula o combo de departamentos quando a pagina é carregada.
$('#cnpj').change(function (e) {
    $('#btnCadastrar').prop("disabled", true);
    var idCNPJ = $('#cnpj').val();
    //chama o serviço que consulta os departamentos.
    $.getJSON('../../classes/model/consulta.php?opcao=FindDeptCnpj&valor=' + idCNPJ, function (dados) {
        //verifica o json e cria um options.
        if (dados.length > 0) {
            var option = '<option value="">Selecione o Departamento</option>';
            $.each(dados, function (i, obj) {
                option += '<option value="' + obj.id + '">' + obj.nome + '</option>';
            });
        } else {
            Reset("Dept");
        }
        $('#cmbDepartamento').html(option).show();
        $('#btnCadastrar').prop("disabled", false);
    });
});
function Reset(tipo) {
    $('#endereco').empty().append('<option>Carregar Endereço</option>>');
    $('#cnpj').val('');
    $('#cmbDepartamento').empty().append('<option>Carregar Departamento</option>>');
    if (tipo === 'Dept') {
        alert("Filial sem departamento");
        $('#cnpj').val('');
        $('#cmbDepartamento').empty().append('<option>Carregar Departamento</option>>');
    }
}