<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
        ?>   
        <?php
        if (isset($_POST['GerarGrafico'])):
            require '../../classes/graficos/GerarGraficos.php';
            $id = $_POST['funcionario'];
            $dataSFormat = $_POST['data'];
            $dataSFormat = str_replace('/', '-', $dataSFormat);

            $data = date('Y-m-d', strtotime($dataSFormat));

            $GerarGraficos = new GerarGraficos();
            if ($GerarGraficos->prodFunc($id, $data)) {
                echo "<script>"
                . "window.location='./GraficoFunc.php'</script>";
            } else {

                echo "<script> alert('Colaborador sem produtividade.');</script>";
            }


        endif;
        ?>
        <script src="../../js/datapicker/jquery-1.10.2.js"></script>
        <script src="../../js/datapicker/jquery-ui.js"></script>
        <script src="../../js/datapicker/configDate.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <link href="../../css/jquery-ui.css" rel="stylesheet">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

        <meta charset="UTF-8">
    </head>
    <body >

        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <form method="post" >
                    <div class="input-prepend">
                        <h1 class="page-header">
                            Produtividade de Funcionários
                        </h1>          

                        <div class="row">
                    <div class="col-lg-12">
                            <div class="col-lg-3">
                                <label for="funcionario">Funcionário</label>
                                <select hidden="true" class="form-control" name="funcionario" id="cmbfuncionario" required>                                                  
                                    <option value="">Selecione o Funcionário</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label for="data">Data</label>
                                <input type="text" class="form-control" id="datepicker" name="data" placeholder="Data" required>                                
                            </div>

                        </div>  
                    </div> 
                        <div class="row"><hr width=95%></div>   
                        <div class="row">    
                            <div class="form-group col-lg-4"></div>
                            <div class="form-group col-lg-4">
                                <input id="btnGerar"  type="submit" name="GerarGrafico" class="btn btn-success" value="Gerar Grafico">

                            </div>    
                        </div>   

                </form>  
            </div>

        </div>
       </main>

    </body>

    <script src="../../js/populaComboGraficoFunc.js"></script>

    <script>
        (function ($) {
            $.widget("custom.combobox", {
                _create: function () {
                    this.wrapper = $("<span>")
                            .addClass("custom-combobox")
                            .insertAfter(this.element);

                    this.element.hide();
                    this._createAutocomplete();
                    this._createShowAllButton();
                },
                _createAutocomplete: function () {
                    var selected = this.element.children(":selected"),
                            value = selected.val() ? selected.text() : "";
                     this.br = $("<br>")
                            .appendTo(this.wrapper)
                            .val(value)
                            .addClass("form-control")
                            .autocomplete({
                                delay: 0,
                                minLength: 0,
                                source: $.proxy(this, "_source")
                            })
                            .tooltip({
                                tooltipClass: "ui-state-highlight"
                            });
                    this.input = $("<input>")
                            .appendTo(this.wrapper)
                            .val(value)
                            .attr("title", "")
                            .attr("placeholder", "Pesquisar funcionário")
                            .addClass("form-control")
                            .autocomplete({
                                delay: 0,
                                minLength: 0,
                                source: $.proxy(this, "_source")
                            })
                            .tooltip({
                                tooltipClass: "ui-state-highlight"
                            });

                    this._on(this.input, {
                        autocompleteselect: function (event, ui) {
                            ui.item.option.selected = true;
                            this._trigger("select", event, {
                                item: ui.item.option
                            });
                        },
                        autocompletechange: "_removeIfInvalid"
                    });
                },
                _createShowAllButton: function () {
                    var input = this.input,
                            wasOpen = false;

                    $("<a>")
                            .attr("tabIndex", -1)
                            .attr("title", "Mostrar Todos os items")
                            .tooltip()
                            .appendTo(this.wrapper)
                            .button({
                                icons: {
                                    primary: "btn btn-primary"
                                },
                                text: false
                            })
                            .removeClass("ui-corner-all")
                            .addClass("")
                            .mousedown(function () {
                                wasOpen = input.autocomplete("widget").is(":visible");
                            })
                            .click(function () {
                                input.focus();

                                // Close if already visible
                                if (wasOpen) {
                                    return;
                                }

                                // Pass empty string as value to search for, displaying all results
                                input.autocomplete("search", "");
                            });
                },
                _source: function (request, response) {
                    var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
                    response(this.element.children("option").map(function () {
                        var text = $(this).text();
                        if (this.value && (!request.term || matcher.test(text)))
                            return {
                                label: text,
                                value: text,
                                option: this
                            };
                    }));
                },
                _removeIfInvalid: function (event, ui) {

                    // Selected an item, nothing to do
                    if (ui.item) {
                        return;
                    }

                    // Search for a match (case-insensitive)
                    var value = this.input.val(),
                            valueLowerCase = value.toLowerCase(),
                            valid = false;
                    this.element.children("option").each(function () {
                        if ($(this).text().toLowerCase() === valueLowerCase) {
                            this.selected = valid = true;
                            return false;
                        }
                    });

                    // Found a match, nothing to do
                    if (valid) {
                        return;
                    }

                    // Remove invalid value
                    this.input
                            .val("")
                            .attr("title", value + " Funcionário não encontrado.")
                            .tooltip("open");
                    this.element.val("");
                    this._delay(function () {
                        this.input.tooltip("close").attr("Kairos", "");
                    }, 2500);
                    this.input.autocomplete("instance").term = "";
                },
                _destroy: function () {
                    this.wrapper.remove();
                    this.element.show();
                }
            });
        })(jQuery);

        $(function () {
            $("#cmbfuncionario").combobox();

        });
    </script>

</html>
	