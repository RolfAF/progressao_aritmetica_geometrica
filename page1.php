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
    </style>
</head>
  
<body style="text-align:center;">
      
    <h1 style="color:#0af;">
        Progressão Aritmética / Geometrica 
    </h1>
      
    <h4>
        <?php
            if(isset($_POST['button1'])) {
                $valor = $_POST['valor'];
                $razao = $_POST['razao'];
                $quant = $_POST['quant'];
                #$nome  = $_POST['nome'];
                if($valor == "") {
                    echo "Insira o valor inicial";
                }
                elseif(!is_numeric($razao)) {
                    echo "Insira a razão de progressão";
                }
                elseif(!is_numeric($quant) or $quant < 2) {
                    echo "Insira a quantidade";
                #}
                #elseif($nome == "") {
                #    echo "Insira o nome para o arquivo JSON";
                }else{
                    $array=array(intval($valor));
                    $old = intval($valor);
                    for($i = 2; $i <= $quant; $i++){
                        $new = $old + $razao;
                        array_push($array,$new);
                        $old = $new;
                    }
                    echo "<br>";
                    echo "Progressão Aritmética Selecionada<br>";
                    echo "Valor Inicial: $valor<br>";
                    echo "Razão de Progressão: $razao<br>";
                    echo "Quantidade de Elementos: $quant<br>";
                    #echo "Nome para o Arquivo JSON: $nome<br>";
                    echo "Progressão Gerada:<br>";
                    print_r($array);
                    $file = fopen("/tmp/progressao.json", "w") or die("Unable to open file!"); // cria arquivo json
                    fwrite($file, json_encode($array));
                    fclose($file);
                    ?>
                    <form action="/test/download.php" method="post">
                        <input type="submit" name="button3" value="Download JSON"/>
                    </form>
                    <form action="/test/page2.php" method="post">
                        <input type="submit" name="button4" value="Visualizar Gráfico"/>
                    </form>
                    <form action="/test/index.php" method="post">
                        <input type="submit" name="button5" value="Voltar"/>
                    </form>
                    <?php
                }
            }elseif(isset($_POST['button2'])) {
                $valor = $_POST['valor'];
                $razao = $_POST['razao'];
                $quant = $_POST['quant'];
                #$nome  = $_POST['nome'];
                if($valor == "") {
                    echo "Insira o valor inicial";
                }
                elseif(!is_numeric($razao)) {
                    echo "Insira a razão de progressão";
                }
                elseif(!is_numeric($quant) or $quant < 2) {
                    echo "Insira a quantidade";
                #}
                #elseif($nome == "") {
                #    echo "Insira o nome para o arquivo JSON";
                }else{
                    $array=array(intval($valor));
                    $old = intval($valor);
                    for($i = 2; $i <= $quant; $i++){
                        $new = $old * $razao;
                        array_push($array,$new);
                        $old = $new;
                    }
                    echo "<br>";
                    echo "Progressão Geométrica Selecionada<br>";
                    echo "Valor Inicial: $valor<br>";
                    echo "Razão de Progressão: $razao<br>";
                    echo "Quantidade de Elementos: $quant<br>";
                    #echo "Nome para o Arquivo JSON: $nome<br>";
                    echo "Progressão Gerada:<br>";
                    print_r($array);
                    $file = fopen("/tmp/progressao.json", "w") or die("Unable to open file!");
                    fwrite($file, json_encode($array));
                    fclose($file);
                    ?>
                    <form action="/test/download.php" method="post">
                        <input type="submit" name="button3" value="Download JSON"/>
                    </form>
                    <form action="/test/page2.php" method="post">
                        <input type="submit" name="button4" value="Visualizar Gráfico"/>
                    </form>
                    <form action="/test/index.php" method="post">
                        <input type="submit" name="button5" value="Voltar"/>
                    </form>
                    <?php
                }
            }else{
                ?>
                <form action="/test/index.php" method="post">
                    <input type="submit" name="button5" value="Voltar"/>
                </form>
                <?php
            }
        ?>
    </h4>

    <div class="vertical-menu">
    <a href="index.php">Inserir Dados</a>
    <a href="page1.php" class="active">Download JSON</a>
    <a href="page2.php">Visualizar Gráfico</a>
    </div>
    
    

</body>
  
</html>
