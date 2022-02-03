<?php
	
    function carregaString($arquivo){
        $arq = fopen($arquivo, "r");
        $string = fgets($arq);
        fclose($arq);
        return $string;
    }

    $arquivoE = "email.txt";
    $arquivoS = "senhaHash.txt";


    //Recebo dados
    $email = carregaString($arquivoE);
    $senha = carregaString($arquivoS);
	
    //Evito que um código tenha sido inserido (Cuidado com ataques XSS)
    $email = htmlspecialchars($email);
    $senha = htmlspecialchars($senha);
?>

<!DOCTYPE html>
<html lang = "pt-BR">

    <head>
       <meta charset = "UTF-8">
       <!-- 1: Tag de responsividade -->
       <meta name = "viewport" content="width=device-width, initial-scale=1">
       <title>PHP 4</title> 
       <!-- 2: Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head> 

    <body>
        <!--Conteúdo principal da página-->
        <main class="container">
            <?php
                echo <<<HTML
                    <table class="table table-striped table-dark">
                        <tr class="row">
                            <td class="col-sm"> $email </td>
                            <td class="col-sm"> $senha </td>
                        </tr>
                    </table>
                HTML;
            ?>
        </main>
    </body>
</html>