<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

try{
    $sql = <<<SQL
    SELECT id, email, hash_senha
    FROM usuario
    SQL;

    //Não será necessário usar prepare statements nesse caso
    //Já que nenhum parâmetro preenchido pelo usuário é usado na Query
    //Como há dados a serem processados usaremos o método query
    $stmt = $pdo->query($sql);
}
catch(Exception $e){
    exit("Ocorreu uma falha: " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <!-- Tag de responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Usuários</title>

    <!-- Bootstrap e CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_listar.css">
</head>

<body>
    
    <!-- Cabeçalho principal-->
    <header>
        <h1>Exibe usuário</h1>
    </header>

    <!--Conteúdo principal da página-->
    <main class="container">

        <table class="table table-striped table-dark">
            <tr>
                <th></th>
                <th>Email</th>
                <th>Senha Hash</th>
            </tr>

            <?php
                while($row = $stmt->fetch()){

                    //Prevenção de ataques XSS
                    $id = $row["id"];
                    $email = htmlspecialchars($row["email"]);

                    echo <<<HTML
                        <tr>
                            <td>
                                <a href="PHP_ex3_excluir.php?id=$id">
                                <img src="../images/delete.png"></a>
                            </td>
                            <td>$email</td>
                            <td>{$row["hash_senha"]}</td>
                        </tr>
                    HTML;
                }
            ?>

        </table>

        <!-- Voltar -->
        <a class="btn btn-primary" href="ex3.html" role="button"> Menu Principal</a>
    </main>

    <!--Rodapé-->
    <footer>
        <p>© Copyright 2022. Todos os direitos reservados</p>
    </footer>
</body>
