<?php

/*Conexão com o banco de dados*/
require "../conexaoMysql.php";
$pdo = mysqlConnect();

/*Classes*/
class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro; 
    $this->cidade = $cidade;
  }
}

$cep = $_GET['cep'] ?? '';

/*Recuperando dados*/
try{
  //Consulta SQL
  $sql = <<<SQL
  SELECT rua, bairro, cidade
  FROM endereco_trab7
  WHERE cep = ?
  LIMIT 1
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$cep]);

  $row = $stmt->fetch();
  $rua = $row["rua"];
  $bairro = $row["bairro"];
  $cidade = $row["cidade"];

  if($rua == null){
    $endereco = new Endereco('', '', '');
    echo json_encode($endereco);
  }
  else{
    $endereco =  new Endereco($cep, $rua, $bairro, $cidade);
    echo json_encode($endereco);
  }

}
catch(Exception $e){
  exit("Ocorreu uma falha: " . $e->getMessage());
}