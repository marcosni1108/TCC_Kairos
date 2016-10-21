$(document).ready(function () {
    function a() {
        $("#cnpj").val("")
    }
    $("#endereco").ready(function () {
        $.getJSON("../../classes/model/consulta.php?opcao=endereco", function (b) {
            if (b.length > 0) {
                var c = '<option value="">Selecione o Endereço</option>';
                $.each(b, function (a, b) {
                    c += '<option value="' + b.id + '">' + b.endereco + " Nº: " + b.numero + "</option>"
                })
            } else
                a();
            $("#endereco").html(c).show(), $("#cnpj").val("")
        })
    }), $("#endereco").change(function (b) {
        var c = $("#endereco").val();
        $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=cnpj&tipo=endereco&valor=" + c, function (b) {
            if (b) {
                var c = "";
                c = b.nomeFilial
            } else
                a();
            $("#cnpj").val(c), $("#btnCadastrar").prop("disabled", !1)
        })
    }), $("#cmbDepartamento").ready(function () {
        $.getJSON("../../classes/model/consulta.php?opcao=departamento", function (b) {
            if (b.length > 0) {
                var c = '<option value="">Selecione o Departamento</option>';
                $.each(b, function (a, b) {
                    c += '<option value="' + b.id + '">' + b.nome + "</option>"
                })
            } else
                a();
            $("#cmbDepartamento").html(c).show(), $("#cnpj").val("")
        })
    }), $("#cmbDepartamento").change(function (b) {
        var c = $("#cmbDepartamento").val();
        $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=cnpj&tipo=atividade&valor=" + c, function (b) {
            if (b) {
                var c = "";
                c = b.nomeFilial
            } else
                a();
            $("#cnpj").val(c), $("#btnCadastrar").prop("disabled", !1)
        })
    }), $("#enderecoEdit").change(function (b) {
        var c = $("#enderecoEdit").val();
        $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=cnpj&tipo=endereco&valor=" + c, function (b) {
            if (b) {
                var c = "";
                c = b.nomeFilial
            } else
                a();
            $("#cnpjEdit").val(c), $("#btnCadastrar").prop("disabled", !1)
        })
    }), $("#lider").ready(function () {
        $("#btnCadastrar").prop("disabled", !0), $("#enderecoEdit").attr("readonly", !0), $.getJSON("../../classes/model/consulta.php?opcao=user&valor=lider", function (b) {
            b.length > 0 ? $.each(b, function (a, b) {
                $("#lider").append('<option value="' + b.id + '">' + b.nome + "</option>")
            }) : a(), $("#enderecoEdit").attr("readonly", !1), $("#btnCadastrar").prop("disabled", !1)
        })
    }), $("#gerente").ready(function () {
        $("#btnCadastrar").prop("disabled", !0), $("#enderecoEdit").attr("readonly", !0), $.getJSON("../../classes/model/consulta.php?opcao=user&valor=Gerente", function (b) {
            b.length > 0 ? $.each(b, function (a, b) {
                $("#gerente").append('<option value="' + b.id + '">' + b.nome + "</option>")
            }) : a(), $("#enderecoEdit").attr("readonly", !1), $("#btnCadastrar").prop("disabled", !1)
        })
    }), $("#departamentoEditAtividade").change(function (b) {
        var c = $("#departamentoEditAtividade").val();
        $("#btnCadastrar").prop("disabled", !0), $.getJSON("../../classes/model/consulta.php?opcao=cnpj&tipo=atividade&valor=" + c, function (b) {
            if (b) {
                var c = "";
                c = b.nomeFilial
            } else
                a();
            $("#cnpjEditAtividade").val(c), $("#btnCadastrar").prop("disabled", !1)
        })
    }), $("#cmbCNPJ").ready(function () {
        $.getJSON("../../classes/model/consulta.php?opcao=endereco", function (b) {
            if (b.length > 0) {
                var c = '<option value="">Selecione o CNPJ</option>';
                $.each(b, function (a, b) {
                    c += '<option value="' + b.id + '">' + b.nomeFilial + "</option>"
                })
            } else
                a();
            $("#cmbCNPJ").html(c).show()
        })
    })
});