<?php
    $produtos = array(
        "Maçã",
        "Banana",
        "Uva",
        "Mandioca",
        "Batata",
        "Repolho",
        "Brocolis",
        "Arroz",
        "Feijão",
        "Cevada",
    );

    $descricao = array(
        "É uma fruta de cor vermelha",
        "É uma fruta amarela",
        "É usada para produção de vinhos",
        "Conhecida também como aipim",
        "É rica em amido",
        "Pode ser roxo ou branco",
        "São cultivados há muito tempo, desde a época do Império Romano",
        "É consumido amplamante no Brasil e Portugal",
        "Rico em Ferro",
        "Uma das principais fontes de alimento para pessoas e animais",
    );
    $qde = 0;
    $qde = trim($_GET["quantidade"]);
    
    if (empty($qde))
		$errorMsg = "A quantidade deve ser informada";
    
?>

<!DOCTYPE html>
<html lang = "pt-BR">

    <head>
       <meta charset = "UTF-8">
        <!-- 1: Tag de responsividade -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>PHP 2</title> 
        <!-- 2: Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head> 

    <body>
        <!--Conteúdo principal da página-->
        <main class = "container">
            <table class="table table-striped table-dark">
                <!--Cabeça da tabela-->
                <thead>
                    <tr>
                        <th scope="col"> Número </th>
                        <th scope="col"> Nome </th>
                        <th scope="col"> Descrição </th>
                    </tr>
                </thead>
                <!--Corpo da tabela -->
                <tbody>
                    <?php
                        for($i = 0; $i < $qde; $i++){
                            $j = rand(0,9);
                            echo '<tr scope="row">';
                            echo '<td>';
                            echo $j;

                            echo '</td>';
                            echo '<td>';
                            echo $produtos[$j];
                            echo '</td>';

                            echo '<td>';
                            echo $descricao[$j];
                            echo '</td>';

                            echo '</tr>';

                        }
                    ?>
                </tbody>
            </table>
        </main>
    </body>
</html>

