<?php
	
    function salvaString($string, $arquivo){
        $arq = fopen($arquivo, "w");
        fwrite($arq, $string);
        fclose($arq);
    }

    //Recebo dados
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);
    
    //Verifico se foram preenchidos
    if (empty($email))
		$errorMsg = "O email é obrigatório";
    if (empty($senha))
		$errorMsg = "A senha é obrigatória";

    // O hash gerado terá 60 caracteres, mas pode aumentar
	$senhaHash = password_hash($senha, PASSWORD_DEFAULT );

	
    $arquivoE = "email.txt";
    $arquivoS = "senhaHash.txt";

    //Salvo em arquivos
    salvaString($email,$arquivoE);
    salvaString($senhaHash,$arquivoS);
?>

<!DOCTYPE html>
<html lang = "pt-BR">

    <head>
       <meta charset = "UTF-8">
       <!-- 1: Tag de responsividade -->
       <meta name = "viewport" content="width=device-width, initial-scale=1">
       <title>PHP 3</title> 
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