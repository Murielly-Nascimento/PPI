<?php
	require "conexaoMysql.php";
	$pdo = mysqlConnect();

	$nome_seg = $_GET["segurado_nome"] ?? "";
	$cpf = $_GET["segurado_cpf"] ?? "";
	$email = $_GET["segurado_email"] ?? "";
	$premio = $_GET["segurado_premio"] ?? "";

	$nome_dep = $_GET["dependente_nome"] ?? "";
	$relacao = $_GET["dependente_relacao"] ?? "";
	$data_nascimento = $_GET["dependente_nascimento"] ?? "";
	$id_segurado;

	$sqlSegurado = <<<SQL
		INSERT INTO segurado(nome_seg, cpf, email, premio)
		VALUES(?, ?, ?, ?)
	SQL;

	$sqlDependente = <<<SQL
		INSERT INTO dependente(nome_dep, relacao, data_nascimento, id_segurado)
		VALUES(?, ?, ?, ?)
	SQL;

	try{

		$pdo->beginTransaction();

		$stmt = $pdo->prepare($sqlSegurado);
		if(!$stmt->execute([$nome_seg, $cpf, $email, $premio]))
			throw new Exception('Falha ao cadastrar segurado');

		$id_segurado = $pdo->lastInsertId();

		$stmt = $pdo->prepare($sqlDependente);
        if(!$stmt->execute([$nome_dep, $relacao, $data_nascimento, $id_segurado]))
            throw new Exception('Falha ao cadastrar dependente');

		$pdo->commit();
		header("location: questao1.html");
        exit();

	}
	catch (Exception $e){
        $pdo->rollBack();
        exit('Falha na transação: ' . $e->getMessage());
    }
?>