<?php

function checkLogin($pdo, $email, $senha)
{
  $sql = <<<SQL
    SELECT hash_senha
    FROM usuario
    WHERE email = ?
    SQL;

  try {
    // Neste caso utilize prepared statements para prevenir
    // ataques do tipo SQL Injection, pois precisamos
    // inserir dados fornecidos pelo usuário na 
    // consulta SQL (o email do usuário)
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if (!$row) return false; // nenhum resultado (email não encontrado)
    
    return password_verify($senha, $row['hash_senha']);
  } 
  catch (Exception $e) {
    //error_log($e->getMessage(), 3, 'log.php');
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

$errorMsg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  require "../conexaoMysql.php";
  $pdo = mysqlConnect();

  $email = $_POST["email"] ?? "";
  $senha = $_POST["senha"] ?? "";

  if (checkLogin($pdo, $email, $senha)) {
    header("location: ex3_dados.html");
    exit();
  } 
  else
    $errorMsg = "Dados incorretos";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <!-- Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Listar</title>

  <!-- Bootstrap e CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style_login.css">
  
</head>

<body>
  <div class="container">
  <main>
    <h3>Efetue login</h3>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3">
      
      <!-- E-mail -->
      <div class="col-sm-12">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" id="email">
      </div>

      <!-- Senha -->
      <div class="col-sm-12">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" name="senha" class="form-control" id="senha">
      </div>
      
      <!-- Botões -->
      <div class="col-sm-12">
        <!-- Entrar -->
        <button class="btn btn-primary btn-block">Entrar</button>

        <!-- Voltar -->
        <a class="btn btn-primary" href="ex3.html" role="button"> Menu Principal</a>
      </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $errorMsg !== "") {
      echo <<<HTML
      <div class="alert alert-warning alert-dismissible" role="alert">
        <strong>$errorMsg</strong>
        <button type="button" class="btn-close" data-dismiss="alert"></button>
      </div>
      HTML;
    }
    ?>
  </main>
  </div>

  <!-- Opcional: Bootstrap Bundle com JavaScript e Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>

</body>

</html>