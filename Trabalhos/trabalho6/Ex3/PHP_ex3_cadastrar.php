<?php
	
require "../conexaoMysql.php";
$pdo = mysqlConnect();

$email = $senha = "";

//Recebo dados
$email = trim($_POST["email"]);
$senha = trim($_POST["senha"]);

//Verifico se foram preenchidos
if (empty($email))
    $errorMsg = "O email é obrigatório";
if (empty($senha))
    $errorMsg = "A senha é obrigatória";

// O hash gerado terá 60 caracteres, mas pode aumentar
$hash_senha = password_hash($senha, PASSWORD_DEFAULT );

try{
    $sql = <<<SQL
    INSERT INTO usuario(email, hash_senha)
    VALUES (?, ?)
    SQL;

    //Como vamos cadastrar dados fornecidos pelo usuários
    //usamos prepare statements
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $email, $hash_senha
    ]);

    header("location: ex3.html");
    exit(); 
}
catch(Exception $e){

    if($e->errorInfo[1] === 1062)
        exit("Dados duplicados: " . $e->getMessage());
    else
        exit("Falha ao cadastrar dados: " . $e->getMessage());

}
?>
