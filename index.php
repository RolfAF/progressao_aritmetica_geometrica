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
        Insira os valores para gerar a progressão:
    </h4>
        
    <form action="/test/page1.php" method="post">
        <label for="valor">Valor Inicial:</label><br>
        <input type="text" id="valor" name="valor"><br>
        <label for="razao">Razão de Progressão:</label><br>
        <input type="text" id="razao" name="razao"><br>
        <label for="quant">Quantidade de Elementos:</label><br>
        <input type="text" id="quant" name="quant"><br>
        <!-- <label for="nome">Nome para Arquivo JSON:</label><br>
        <input type="text" id="nome" name="nome"><br> -->
        <label for="button1">Selecione o Tipo de Progressão:</label><br>
        <input type="submit" name="button1" value="P. Aritmética"/>
        <input type="submit" name="button2" value="P. Geométrica"/>
    </form>

    <div class="vertical-menu">
    <a href="index.php" class="active">Inserir Dados</a>
    <a href="page1.php">Download JSON</a>
    <a href="page2.php">Visualizar Gráfico</a>
    </div>

</body>
  
</html>
