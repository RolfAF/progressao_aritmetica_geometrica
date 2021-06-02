<?php
function check_json($json) {
    $items = count($json);
    $razao_ari = array();
    for($i = 1; $i < sizeof($json); $i++){
        array_push($razao_ari, $json[$i] - $json[$i-1]);        
    }
    #print_r($razao_ari);
    $array_count_ari = array();
    foreach($razao_ari as $item){
        $count = count(array_keys($razao_ari, $item));
        #array_push($array_count_ari, $item => $count);
        $array_count_ari[$item] = $count;
    }
    #print_r($array_count_ari);
    $razao_geo = array();
    for($i = 1; $i < sizeof($json); $i++){
        array_push($razao_geo, $json[$i] / $json[$i-1]);
    }
    #print_r($razao_geo);
    $array_count_geo = array();
    foreach($razao_geo as $item){
        $count = count(array_keys($razao_geo, $item));
        $array_count_geo[sprintf("%.3f", $item)] = $count;
    }
    #print_r($array_count_geo);
    if(count($array_count_ari) == 1){
        echo "Tipo de Progressão: Aritmética; ";
    }elseif(count($array_count_geo) == 1){
        echo "Tipo de Progressão: Geométrica; ";
    }elseif(count($array_count_ari) < count($array_count_geo)){
        echo "Tipo de Progressão: Aritmética Parcial; ";
    }elseif(count($array_count_ari) > count($array_count_geo)){
        echo "Tipo de Progressão: Geométrica Parcial; ";
    }else{
        echo "Tipo de Progressão: Indeterminado; ";
    }
    $quant = count($json);
    echo "Quantidade de Elementos: ".$quant;
    foreach($json as $item){
        $sum += $item;
    }
    echo "; Somatório: ".$sum;
    $media = $sum / $quant;
    echo "; Média: ".$media;
    $ordered = $json;
    sort($ordered);
    if($quant % 2 == 0){
        $meio = $quant/2;
        $mediana = (($ordered[$meio] + $ordered[($meio-1)])/2);
    }else{
        $mediana = $ordered[($quant-1)/2];
    }
    echo "; Mediana: ".$mediana;
}

if(isset($_POST['button1'])) {
    $json = file_get_contents($_POST['fileToUpload']);
}else{
    $json = file_get_contents("/tmp/progressao.json"); // carrega o ultimo arquivo json gerado
}
$array = json_decode($json, true);
$dataPoints = array();
for($i = 0; $i <= sizeof($array); $i++){
    array_push($dataPoints,array("y" => $array[$i]));
}
    
?>
<!DOCTYPE html>
<html>
      
<head>
    <title>
        Progressão Aritmética / Geométrica
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .vertical-menu {
            width: 200px;
            position: absolute;
            top: 140px;
            left: 10px;
        }

        .vertical-menu a {
            background-color: #eee;
            color: black;
            display: block;
            padding: 12px;
            text-decoration: none;
        }

        .vertical-menu a:hover {
            background-color: #ccc;
        }

        .vertical-menu a.active {
            background-color: #0af;
            color: white;
            font-weight: bold;
        }
        .chart {
            width: 700px;
            height: 300px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <script>
    window.onload = function () {
        
    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "Progressão"
        },
        axisY: {
            title: "Valores"
        },
        data: [{
            type: "line",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
        
    }
    </script>
</head>
  
<body style="text-align:center;">
      
    <h1 style="color:#0af;">
        Progressão Aritmética / Geometrica
    </h1>
      
    <h4>
        <?php check_json($array); ?>
    </h4>

    <div class="vertical-menu">
    <a href="index.php">Inserir Dados</a>
    <a href="page1.php">Download JSON</a>
    <a href="page2.php" class="active">Visualizar Gráfico</a>

    </div>
    
    <div class="chart" id="chartContainer"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <form method="post" enctype="multipart/form-data">
        Selecione outro arquivo JSON:
        <input type="text" name="fileToUpload" id="fileToUpload">
        <input type="submit" name="button1" value="Upload"/>
    </form> 

</body>
  
</html>
