<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

try{
    $sql = <<<SQL
    SELECT pessoa.nome, paciente.peso, paciente.altura, paciente.tipo_sangue, paciente.id_pessoa
    FROM paciente
    INNER JOIN pessoa on paciente.id_pessoa = pessoa.id;
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
<!-- Página exibe endereço-->

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <!-- Tag de responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pacientes</title>

    <!-- Bootstrap e CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_listar.css">
</head>

<body>
    
    <!-- Cabeçalho principal-->
    <header>
        <h1>Exibe paciente</h1>
    </header>

    <div class="container">

        <!--Conteúdo principal da página-->
        <table class="table table-striped table-dark">
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Tipo Sanguíneo</th>
            </tr>

            <?php
                while($row = $stmt->fetch()){

                    //Prevenção de ataques XSS
                    $id_pessoa = $row["id_pessoa"];
                    $nome = htmlspecialchars($row["nome"]);
                    $peso = htmlspecialchars($row["peso"]);
                    $altura = htmlspecialchars($row["altura"]);
                    $tipo_sangue = htmlspecialchars($row["tipo_sangue"]);

                    echo <<<HTML
                        <tr>
                            <td>
                                <a href="PHP_ex4_excluir.php?id_pessoa=$id_pessoa">
                                <img src="../images/delete.png"></a>
                            </td>
                            <td>$nome</td>
                            <td>$peso</td>
                            <td>$altura</td>
                            <td>$tipo_sangue</td>
                        </tr>
                    HTML;
                }
            ?>

        </table>
        <a href="ex4.html"> Menu Principal</a>
    </div>

    <!--Rodapé-->
    <footer>
        <p>© Copyright 2022. Todos os direitos reservados</p>
    </footer>
</body>

</html>