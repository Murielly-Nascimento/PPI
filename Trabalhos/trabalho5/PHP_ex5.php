<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        function carregaString($arquivo){
            $arq = fopen($arquivo, "r");
            $string = fgets($arq);
            fclose($arq);
            return $string;
        }
    
        $arquivoE = "email.txt";
        $arquivoS = "senhaHash.txt";
    
        //Recebo dados do arquivo
        $emailArq = carregaString($arquivoE);
        $senhaArq = carregaString($arquivoS);
    
        //Recebo dados do navegador
        $email = trim($_POST["email"]);
        $senha = trim($_POST["senha"]);
    
        //Verifico se foram preenchidos
        if (empty($email))
            $errorMsg = "O email é obrigatório";
        if (empty($senha))
            $errorMsg = "A senha é obrigatória";
    
        if (password_verify($senha, $senhaArq) && ($email == $emailArq)){
            echo "Bem vindo! <br>"; 
            echo "Seu email é: $email! <br>";
            exit();
        }
        else{
            header("Location: PHP_ex5.php");
            exit();
        }

    }



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <!-- 1: Tag de responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exercício 5</title>

    <!-- 2: Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Cabeçalho principal, presente em todas as páginas-->
    <header>
        <h1>Exercício 5</h1>
    </header>

    <div class="container">

        <!--Menu de naveção, com links para todas as páginas-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Main</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ex1.html">Exercício 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="PHP_ex2.php?quantidade=9">Exercício 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ex3.html">Exercício 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="PHP_ex4.php">Exercício 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="ex5.html">Exercício 5</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!--Conteúdo principal da página-->
        <main>
            <!-- Viewport na horizontal exceto em smartphones >= 576 px-->
            <form class="row g-3" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" method="post">

                <!-- Email e Senha-->
                <div class="col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="col-sm-6">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>

                <!-- Enviar -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-send-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z" />
                        </svg>
                        Entrar
                    </button>
                </div>
            </form>
        </main>
    </div>

    <!--Rodapé-->
    <footer>
        <p>© Copyright 2022. Todos os direitos reservados</p>
    </footer>

</body>

</html>