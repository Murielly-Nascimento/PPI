<?php

require_once "../conexaoMysql.php";
require_once "../autentificacao.php";

session_start();
$pdo = mysqlConnect();
exitWhenNotLogged($pdo);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cadastro de Paciente">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_restrito.css">
    <title>Cadastro de Paciente</title>
</head>

<body>
    <!-- Cabeçalho principal, presente em todas as páginas-->
    <header>
        <img src="../imagens/logotype.png" width="200" height="200" alt="logotipo da Clínica Aquae Vitae">
        <h1>Clínica Aquae Vitae</h1>
    </header>

    <!--Menu de naveção, com links para todas as páginas-->
    <div class="dropdown">
        <a class="btn btnNav" href="index.php">Home</a>

        <button class="btn btnNav dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Cadastrar
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="FORM_funcionario.php">Novo Funcionario</a>
            <a class="dropdown-item" id="currently-active-tab" href="FORM_paciente.php">Novo Paciente</a>
        </div>

        <button class="btn btnNav dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Listar
        </button>
        <div class="dropdown-menu" id="listagem">
            <a class="dropdown-item" href="LIST_funcionario.php">Listar Funcionarios</a>
            <a class="dropdown-item" href="LIST_paciente.php">Listar Pacientes</a>
            <a class="dropdown-item" href="LIST_endereco.php">Listar Endereços</a>
            <a class="dropdown-item" href="LIST_agendamento.php">Agendamentos e Consultas dos Clientes</a>
            <a class="dropdown-item" id="dropdown-medico" href="LIST_consultas.php">Meus Agendamentos e Consultas</a>
        </div>

        <a class="btn btnNav" href="logout.php">Logout</a>
    </div>

    <div class="container">
        <main>
            <h2>Cadastro de Paciente</h2>
            <form action="CAD_paciente.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Dados Paciente</legend>
                    <div class="row m-3 g-3">
                        <div class="col-md-8">
                            <label for="nome" class="form-label">Nome: </label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="sexo" class="form-label">Sexo: </label>
                            <select name="sexo" id="sexo" class="form-select" required>
                                <option value="">Selecione..</option>
                                <option value="f">Feminino</option>
                                <option value="m">Masculino</option>
                                <option value="o">Outros</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-3 g-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email: </label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone: </label>
                            <input type="tel" id="telefone" name="telefone" class="form-control"
                                pattern="\(d{2})\d{5}-\d{4}" placeholder="(xx)xxxxx-xxxx" required>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Endereço</legend>
                    <div class="row m-3 g-3">
                        <div class="col-md-4">
                            <label for="cep" class="form-label">CEP:</label>
                            <input type="text" id="cep" name="cep" class="form-control" pattern="\d{5}-\d{3}.*"
                                placeholder="xxxxx-xxx" required>
                        </div>
                        <div class="col-md-4">
                            <label for="estado" class="form-label">Estado:</label>
                            <select id="estado" name="estado" class="form-select">
                                <option value="">Selecione..</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="cidade" class="form-label">Cidade:</label>
                            <input type="text" id="cidade" name="cidade" class="form-control" required>
                        </div>
                    </div>
                    <div class="row m-3 g-3">
                        <div class="col-md-8">
                            <label for="logradouro" class="form-label">Logradouro: </label>
                            <input type="text" id="logradouro" name="logradouro" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="numero" class="form-label">Numero: </label>
                            <input type="number" id="numero" name="numero" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="subtitulo">Informações Clínica</legend>
                    <div class="row m-3 g-3">
                        <div class="col-md-4">
                            <label for="peso" class="form-label">Peso: </label>
                            <input type="number" step="any" id="peso" name="peso" class="form-control"
                                placeholder="00.00 (insira em kg)" required>
                        </div>
                        <div class="col-md-4">
                            <label for="altura" class="form-label">Altura: </label>
                            <input type="number" step="any" id="altura" name="altura" class="form-control"
                                placeholder="00.00 (insira em cm)" required>
                        </div>
                        <div class="col-md-4">
                            <label for="tipoSanguineo" class="form-label">Tipo sanguineo: </label>
                            <select id="tipoSanguineo" name="tipoSanguineo" class="form-select">
                                <option value="">Selecione..</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <div class="d-grid gap-2 col-3 mx-auto my-4">
                    <button class="btn btn-light" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-send-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z" />
                        </svg>
                        Enviar
                    </button>
                </div>
            </form>
        </main>
    </div>

    <!--Rodapé-->
    <footer>
        © Copyright 2021. Todos os direitos reservados.
    </footer>

    <script src="../js/bootstrap.js"></script>
    <script src="../js/estados.js"></script>
    <script src="../js/buscaEndereco.js"></script>
    <script src="../js/abaConsultas.js"></script>
    <script>
        window.addEventListener("DOMContentLoaded", iniciaPagina);

        function iniciaPagina() {
            /*Chama função para adicionar Bootstrap*/
            adicionaBootstrap();

            /*Define quando a função adicionaEstados é executada*/
            const campoEstado = document.querySelector("#estado");
            campoEstado.addEventListener("click", adicionaEstados(campoEstado));

            /*Define quando a função de buscar endereço pelo cep é executada*/
            const inputCep = document.querySelector("#cep");
            inputCep.onkeyup = () => buscaEndereco(inputCep.value);

            /*Chama função adiciona aba Minhas Consultas*/
            abaConsultas();
        }
    </script>
</body>

</html>
