function Reset(a) {
    $("#endereco").empty().append("<option>Carregar Endereço</option>>"), $("#cnpj").val(""), $("#cmbDepartamento").empty().append("<option>Carregar Departamento</option>>"), "Parada" === a && (alert("Departamento sem paradas"), location.href = "resgistrarParada.php", $("#cmbAtividade").empty().append("<option>Carregar Atividades</option>>")), "Dept" === a && (alert("Filial sem departamento"), $("#cnpj").val(""), $("#cmbDepartamento").empty().append("<option>Carregar Departamento</option>>"))
}
$("#cnpj").ready(function () {
    $.getJSON("../../classes/model/consulta.php?opcao=allCNPJ", function (a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione a Filial</option>';
            $.each(a, function (a, c) {
                b += '<option value="' + c.id + '">' + c.nomeFilial + "</option>"
            })
        } else
            Reset();
        $("#cnpj").html(b).show()
    })
}), $("#cnpj").change(function (a) {
    $("#btnCadastrar").prop("disabled", !0);
    var b = $("#cnpj").val();
    $.getJSON("../../classes/model/consulta.php?opcao=FindDeptCnpj&valor=" + b, function (a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione o Departamento</option>';
            $.each(a, function (a, c) {
                b += '<option value="' + c.id + '">' + c.nome + "</option>"
            })
        } else
            Reset("Dept");
        $("#cmbDepartamento").html(b).show(), $("#btnCadastrar").prop("disabled", !1)
    })
}), $("#cmbDepartamento").change(function (a) {
    $("#btnCadastrar").prop("disabled", !0);
    var b = $("#cmbDepartamento").val();
    $.getJSON("../../classes/model/consulta.php?opcao=BuscaTipoParada&valor=" + b, function (a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione a parada</option>';
            $.each(a, function (a, c) {
                b += '<option value="' + c.Id + '">' + c.Nome + "</option>"
            })
        } else
            Reset("Parada");
        $("#cmbParada").html(b).show(), $("#btnCadastrar").prop("disabled", !1)
    })
}), $("#tempo_parada").blur(function (a) {
    var b = $("#tempo_parada").val();
    b = parseInt(b), b > 60 ? ($("#tempo_parada").val(""), alert("O tempo da parada não pode passar de 60 minutos.")) : 0 === b && (alert("Parada não pode ser 0"), $("#tempo_parada").val(""))
});