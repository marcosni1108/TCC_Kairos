<?php
if (isset($_POST['GerarGrafico'])):
            require '../../classes/graficos/GerarGraficos.php';
            $id = $_POST['funcionario'];
            $dataSFormat = $_POST['data'];
            $dataSFormat = str_replace('/', '-', $dataSFormat);

            $data = date('Y-m-d', strtotime($dataSFormat));

            $GerarGraficos = new GerarGraficos();
            if ($GerarGraficos->prodFunc($id, $data)) {
                return 'true';
            } else {

                return 'false';
            }


        endif;
