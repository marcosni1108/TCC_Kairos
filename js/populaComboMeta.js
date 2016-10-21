function Reset(a) {
    $("#endereco").empty().append("<option>Carregar Endereço</option>>"), $("#cnpj").val(""), $("#cmbDepartamento").empty().append("<option>Carregar Departamento</option>>"), "atividade" === a && (alert("Departamento sem Atividades"), location.href = "cadastroMeta.php", $("#cmbAtividade").empty().append("<option>Carregar Atividades</option>>")), "Dept" === a && (alert("Filial sem departamento"), $("#cnpj").val(""), $("#cmbDepartamento").empty().append("<option>Carregar Departamento</option>>")), "meta" === a && (alert("Atividade sem Meta. Por favor cadastre a mostra primeiro."), window.location = "./cadastroMeta.php")
}
$("#cnpj").ready(function () {
    $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=allCNPJ", function (a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione a Filial</option>';
            $.each(a, function (a, c) {
                b += '<option value="' + c.id + '">' + c.nomeFilial + "</option>"
            })
        } else
            Reset();
        $("#cnpj").html(b).show(), $("#btnCadastrar").prop("disabled", !1)
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
    var b = $("#cmbDepartamento").val();
    $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=atividade&valor=" + b, function (a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione a Atividade</option>';
            $.each(a, function (a, c) {
                b += '<option value="' + c.id + '">' + c.nome + "</option>"
            })
        } else
            Reset("atividade");
        $("#cmbAtividade").html(b).show(), $("#btnCadastrar").prop("disabled", !1)
    })
}), $("#cmbAtividade").change(function (a) {
    var b = $("#cmbAtividade").val(),
            c = $("#cmbDepartamento").val();
    $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=findMeta&valor=" + c + "&tipo=" + b, function (a) {
        if (0 !== a.length) {
            var b = "";
            b = a[0].Meta
        } else
            Reset("meta");
        $("#meta").val(b), $("#btnCadastrar").prop("disabled", !1)
    })
});