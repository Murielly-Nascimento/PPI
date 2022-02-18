<?php
require "../conexaoMysql.php";
$pdo = mysqlConnect();

$id = $_GET["id"] ?? "";

try {

  $sql = <<<SQL
  DELETE FROM usuario
  WHERE id = ?
  LIMIT 1
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois a declaração
  // SQL contem um parâmetro (cpf) vindo da URL
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);

  header("location: PHP_ex3_listar.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}