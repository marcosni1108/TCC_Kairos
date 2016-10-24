<html>
    <head>
        <title>Kairos</title>
        <?php
        include "../include/include_css.php";
        include "../header/header.php";
        include "../../classes/model/validaOperario.php";
        include "../../classes/model/validaLider.php";
        session_start();
        $departamento = new departamento(); 
        $id = $_SESSION['departamento'];
        $departamento->setId($id);
        $resultado = $departamento->find($id);
        
        if (isset($_POST['GerarGrafico'])):
            require '../../classes/graficos/GerarGraficos.php';
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];
            $_SESSION['mes'] = $mes;
            $_SESSION['ano'] = $ano;
            $GerarGraficos = new GerarGraficos();
            if ($GerarGraficos->ativiGraficoDept($_SESSION['departamento'],$mes, $ano)) {
                echo "<script>"
                . "window.location='./GraficoAtividadeDept.php'</script>";
            } else {
                echo "<script> window.location='./GraficoAtividadeDept.php'</script>";
            }


        endif;
        ?>
        <link href="../../css/jquery-ui.css" rel="stylesheet">
<!--    <script src="../../js/datapicker/jquery-1.10.2.js"></script>
        <script src="../../js/datapicker/jquery-ui.js"></script>
        <script src="../../js/datapicker/configDate.js"></script>-->
        <script src="../../js/bootstrap.min.js"></script>


        <meta charset="UTF-8">
    </head>
    <body >

        <main class="mdl-layout__content">
            <div class="col-lg-12">
                <form method="post" >
                    <div class="input-prepend">
                        <h1 class="page-header text-center">
                            Produtividade de Atividades
                        </h1>          
                        <div class="row">
                            <div class="col-md-7">
                                <h4><?php echo '<label for="expdicao">Departamento: '.$resultado->nome.'</label>'; ?></h4>
                            </div>
                        </div> 
                        <div class="row">
                    <div class="col-lg-12">
                            <div class="col-lg-2">
                                <label for="mes">Mes</label>
                                <select type="mes" class="form-control" name="mes" id="mes">
                                    <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>                                    
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                </select>                                
                            </div>
                            <div class="col-lg-2">
                                <label for="ano">Ano</label>
                                <select type="ano" class="form-control" name="ano" id="ano">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>                                    
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>                                
                            </div>                       
                        </div>  
                    </div> 
                        <div class="row"><hr width=95%></div>   
                        <div class="row">    
                            <div class="form-group col-lg-4"></div>
                            <div class="form-group col-lg-4 text-center">
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
<script src="../../js/material.min.js"></script>
</html>
