<?php 
 
$produtividade = new produtividade();
$row = $produtividade->findAll();
        

echo "<script>";
echo "var chartData = [";
 foreach ($produtividade->findAll() as $key => $value){

    $data = $value->data;
    
    $quantidade = $value->quantidade;


    echo "{ y: '" . date('d/m', strtotime($data)) . "', a: " . $quantidade . " },";
}
echo "]";
echo "\n</script>";
echo" \n<script>

  Morris.Bar({
  element: 'chart',
  data: chartData,
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Produtividade']
});</script>"
?>