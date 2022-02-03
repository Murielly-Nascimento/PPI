<!DOCTYPE html>
<html lang = "pt-BR">

    <head>
       <meta charset = "UTF-8">
       <!-- 1: Tag de responsividade -->
       <meta name = "viewport" content="width=device-width, initial-scale=1">
       <title>PHP 1</title> 
       <!-- 2: Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head> 

    <body>
        <!--Conteúdo principal da página-->
        <main class="container">
            <?php
                $CEP = $_POST["CEP"] ?? "";
                $logradouro = $_POST["logradouro"] ?? "";
                $bairro = $_POST["bairro"] ?? "";
                $cidade = $_POST["cidade"] ?? "";
                $estado = $_POST["estado"] ?? "";
                echo <<<HTML
                    <table class="table table-striped table-dark">
                        <tr class="row">
                            <td class="col-sm"> $CEP </td>
                            <td class="col-sm"> $logradouro </td>
                            <td class="col-sm"> $bairro </td>
                            <td class="col-sm"> $cidade </td>
                            <td class="col-sm"> $estado </td>
                        </tr>
                    </table>
                HTML;
            ?>
        </main>
    </body>
</html>