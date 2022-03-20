<?php
	require "conexaoMysql.php";
	$pdo = mysqlConnect();

	$sql = <<<SQL
		SELECT nome_dep, relacao, data_nascimento, nome_seg, cpf, email, premio
		FROM dependente, segurado
		WHERE segurado.id = dependente.id_segurado
	SQL;

	try{
		$stmt = $pdo->query($sql);
	}
	catch (Exception $e){
        exit("Ocorreu uma falha: " . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<title>Prova de PPI - 2022-01</title>
	</head>

	<body>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Relação</th>
					<th>Data de Nascimento</th>
					<th>Segurador</th>
					<th>CPF segurador</th>
					<th>E-mail Segurador</th>
					<th>Premio</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row = $stmt->fetch()){
						$nome = htmlspecialchars($row["nome_dep"]);
                        $relacao = htmlspecialchars($row["relacao"]);
                        $data_nascimento = htmlspecialchars($row["data_nascimento"]);
                        $nome_seg = htmlspecialchars($row["nome_seg"]);
                        $cpf = htmlspecialchars($row["cpf"]);
						$email = htmlspecialchars($row["email"]);
						$premio = htmlspecialchars($row["premio"]);

						echo <<<HTML
							<tr>
								<td>$nome</td>
								<td>$relacao</td>
								<td>$data_nascimento</td>
								<td>$nome_seg</td>
								<td>$cpf</td>
								<td>$email</td>
								<td>$premio</td>
							</tr>
						HTML;
					}
				?>

			</tbody>
		</table>

	</body>
</html>