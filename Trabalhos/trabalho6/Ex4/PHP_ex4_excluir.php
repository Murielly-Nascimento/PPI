<?php
require "../conexaoMysql.php";
$pdo = mysqlConnect();

$id_pessoa = $_GET["id_pessoa"] ?? "";

$sql1 = <<<SQL
    DELETE FROM paciente
    WHERE id_pessoa = ?
    LIMIT 1
    SQL;

$sql2 = <<<SQL
    DELETE FROM pessoa
    WHERE id = ?
    LIMIT 1
    SQL;

try {
    //Inicio da transação
    $pdo->beginTransaction();


    $stmt1 = $pdo->prepare($sql1);
    if (! $stmt1->execute([$id_pessoa]))
        throw new Exception('Falha na remoção Paciente');

    $stmt2 = $pdo->prepare($sql2);
    if (! $stmt2->execute([$id_pessoa]))
        throw new Exception('Falha na remoção Pessoa');

    //Se nenhuma excecao foi lancada, efetiva as operacoes
    $pdo->commit();

    header("location: PHP_ex4_listar.php");
    exit();
} 
catch (Exception $e) {  
    //Desfaz as operacoes em caso de erro (exceção lançada)
	$pdo->rollBack();
	exit('Falha na transação: ' . $e->getMessage());
}