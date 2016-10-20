function Reset(a) {
    $("#endereco").empty().append("<option>Carregar Endereço</option>>"), $("#cnpj").val(""), $("#cmbDepartamento").empty().append("<option>Carregar Departamento</option>>"), "Dept" === a && (alert("Filial sem departamento"), $("#cnpj").val(""), $("#cmbDepartamento").empty().append("<option>Carregar Departamento</option>>"))
}
$("#nomeFilial").ready(function() {
    $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=allCNPJ", function(a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione a filial</option>';
            $.each(a, function(a, c) {
                b += '<option value="' + c.id + '">' + c.nomeFilial + "</option>"
            })
        } else Reset();
        $("#nomeFilial").html(b).show(), $("#btnCadastrar").prop("disabled", !1)
    })
}), $("#nomeFilial").change(function(a) {
    $("#btnCadastrar").prop("disabled", !0);
    var b = $("#nomeFilial").val();
    $.getJSON("../../classes/model/consulta.php?opcao=FindDeptCnpj&valor=" + b, function(a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione o Departamento</option>';
            $.each(a, function(a, c) {
                b += '<option value="' + c.id + '">' + c.nome + "</option>"
            })
        } else Reset("Dept");
        $("#cmbDepartamento").html(b).show(), $("#btnCadastrar").prop("disabled", !1)
    })
}), $("#cmbDepartamento").change(function(a) {
    var b = $("#cmbDepartamento").val();
    $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=AtividadeMeta&valor=" + b, function(a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione o Atividade</option>';
            $.each(a, function(a, c) {
                b += '<option value="' + c.id + '">' + c.nome + "</option>"
            }), $("#cmbAtividade").html(b).show(), $("#btnCadastrar").prop("disabled", !1)
        }
    })
}), $("#cnpjEdit").ready(function() {
    var a = $("#cnpjEdit").val();
    $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=allCNPJ", function(b) {
        if (b.length > 0) {
            var c = "";
            $.each(b, function(b, d) {
                a !== d.id && (c += '<option value="' + d.id + '">' + d.cnpj + "</option>")
            })
        } else Reset();
        $("#cnpjEdit").append(c)
    }), $.getJSON("../../classes/model/consulta.php?opcao=FindDeptCnpj&valor=" + a, function(a) {
        var b = $("#cmbDepartamentoEdit").val();
        if (a.length > 0) {
            var c = "";
            $.each(a, function(a, d) {
                b !== d.id && (c += '<option value="' + d.id + '">' + d.nome + "</option>")
            })
        }
        $("#cmbDepartamentoEdit").append(c), $("#btnCadastrar").prop("disabled", !1)
    })
}), $("#cnpjEdit").change(function(a) {
    $("#btnCadastrar").prop("disabled", !0);
    var b = $("#cnpjEdit").val();
    $.getJSON("../../classes/model/consulta.php?opcao=FindDeptCnpj&valor=" + b, function(a) {
        if (a.length > 0) {
            var b = '<option value="">Selecione o Departamento</option>';
            $.each(a, function(a, c) {
                b += '<option value="' + c.id + '">' + c.nome + "</option>"
            })
        } else Reset("Dept");
        $("#cmbDepartamentoEdit").html(b).show(), $("#btnCadastrar").prop("disabled", !1)
    })
});