function Reset(a) {
    $("#endereco").empty().append("<option>Carregar Endereço</option>>"), $("#cnpj").val(""), $("#cmbDepartamento").empty().append("<option>Carregar Departamento</option>>"), "atividade" === a && (alert("Departamento sem Atividades/ Atividades sem Meta"), location.href = "cadastraProdutividade.php", $("#cmbAtividade").empty().append("<option>Carregar Atividades</option>>")), "Dept" === a && (alert("Filial sem departamento"), $("#cnpj").val(""), $("#cmbDepartamento").empty().append("<option>Carregar Departamento</option>>"))
}
$("#cnpj").ready(function () {
    $("#btnIniciar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=allCNPJ", function (a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione a Filial</option>';
            $.each(a, function (a, c) {
                b += '<option value="' + c.id + '">' + c.nomeFilial + "</option>"
            })
        } else
            Reset();
        $("#cnpj").html(b).show(), $("#btnIniciar").prop("disabled", !1)
    })
}), $("#cnpj").change(function (a) {
    $("#btnIniciar").prop("disabled", !0);
    var b = $("#cnpj").val();
    $.getJSON("../../classes/model/consulta.php?opcao=FindDeptCnpj&valor=" + b, function (a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione o Departamento</option>';
            $.each(a, function (a, c) {
                b += '<option value="' + c.id + '">' + c.nome + "</option>"
            })
        } else
            Reset("Dept");
        $("#cmbDepartamento").html(b).show(), $("#btnIniciar").prop("disabled", !1)
    })
}), $("#cmbDepartamento").change(function (a) {
    var b = $("#cmbDepartamento").val();
    $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=AtividadeMeta&valor=" + b, function (a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione o Atividade</option>';
            $.each(a, function (a, c) {
                b += '<option value="' + c.id + '">' + c.nome + "</option>"
            })
        } else
            Reset("atividade");
        $("#cmbAtividade").html(b).show(), $("#btnIniciar").prop("disabled", !1)
    })
});