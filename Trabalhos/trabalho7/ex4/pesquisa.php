<?php

/*Conexão com o banco de dados*/
require "../conexaoMysql.php";
$pdo = mysqlConnect();

/*Classes*/
class Medico
{
    public $nome;
    public $telefone;

    function __construct($nome, $telefone)
    {
    $this->nome = $nome;
    $this->telefone = $telefone;
    }
}

$especialidade = $_GET['especialidade'] ?? '';

/*Recuperando dados*/
try{
    //Consulta SQL
    $sql = <<<SQL
    SELECT nome, telefone
    FROM medico
    WHERE especialidade = ?
    SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$especialidade]);

    $especialidade = [];
    $cont = 0;
    while($row = $stmt->fetch()){
        $aux = new Medico($row["nome"], $row["telefone"]);
        $especialidade[$cont] = $aux;
        $cont++;
    }
    echo json_encode($especialidade);
}
catch(Exception $e){
    exit("Ocorreu uma falha: " . $e->getMessage());
}