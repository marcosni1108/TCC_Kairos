<?php

  require 'db_pld.php';

  $result = mysqli_query($conn, 'SELECT `Nome`, `Total` FROM vendas');

  echo "<script>";
  echo "var chartData = [";
  while(($row = mysqli_fetch_array($result, MYSQLI_ASSOC))!=NULL) {

      $nome = $row["Nome"];
      $valor = $row["Total"];

      echo "{ y: '".$nome."', a: ".$valor." },";
  }
  echo "]";
  echo "</script>";
  echo"<script>

  Morris.Bar({
  element: 'chart',
  data: chartData,
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Vendas']
});</script>"
?>