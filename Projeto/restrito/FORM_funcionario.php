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
    <meta name="description" content="Página Home">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_restrito.css">
    <title>Cadastro de Funcionário</title>

    <style>
        #infMedico {
            display: none;
        }
    </style>
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
            <a class="dropdown-item" id="currently-active-tab" href="FORM_funcionario.php">Novo Funcionario</a>
            <a class="dropdown-item" href="FORM_paciente.php">Novo Paciente</a>
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
            <h2>Cadastro de Funcionário</h2>
            <form action="CAD_funcionario.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Dados Funcionario</legend>
                    <div class="row m-3 g-3">
                        <div class="col-md-8">
                            <label class="form-label" for="nome">Nome: </label>
                            <input class="form-control" type="text" id="nome" name="nome" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="sexo">Sexo: </label>
                            <select class="form-select" name="sexo" id="sexo" required>
                                <option value="">Selecione..</option>
                                <option value="f">Feminino</option>
                                <option value="m">Masculino</option>
                                <option value="o">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label " for="email">Email: </label>
                            <input class="form-control" type="email" id="email" name="email" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="telefone">Telefone: </label>
                            <input class="form-control" type="tel" id="telefone" name="telefone"
                                pattern="\(d{2})\d{5}-\d{4}" placeholder="(xx)xxxxx-xxxx" required>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Endereço</legend>
                    <div class="row m-3 g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="cep">CEP:</label>
                            <input class="form-control" type="text" id="cep" name="cep" pattern="\d{5}-\d{3}.*"
                                placeholder="xxxxx-xxx" required>
                        </div>
                        <div class="col-md-4">
                            <label for="estado" class="form-label">Estado:</label>
                            <select id="estado" name="estado" class="form-select">
                                <option value="">Selecione..</option>
                            </select>
                            <!-- <input type = "text" id = "estado" name = "estado" pattern = "{A-Za-z}{2}" required> -->
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="cidade">Cidade:</label>
                            <input class="form-control" type="text" id="cidade" name="cidade" required>
                        </div>
                        <div class="col-md-9">
                            <label class="form-label" for="logradouro">Logradouro: </label>
                            <input class="form-control" type="text" id="logradouro" name="logradouro" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="numero">Numero: </label>
                            <input class="form-control" type="number" id="numero" name="numero">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Informações Clínicas</legend>
                    <div class="row m-3 g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="dataInicioContrato">Início do contrato:</label>                           </label>
                            <input class="form-control" type="date" id="dataInicioContrato" name="dataInicioContrato"
                                placeholder="Informe a data" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="salario">Salário: </label>
                            <input class="form-control" type="number" step="any" id="salario" name="salario"
                                placeholder="00.00 (insira em reais)" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="senha">Senha: </label>
                            <input class="form-control" type="password" id="senha" name="senha"
                                placeholder="Insira uma senha" required>
                        </div>
                    </div>
                    <div class="row m-3 g-3">
                        <div class="col-md">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="profissao" id="medico" value="medico">
                                <label class="form-check-label" for="medico">Médico</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="profissao" id="outro" value="outro">
                                <label class="form-check-label" for="outro">Outro</label>
                              </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="infMedico">
                    <legend>Informações Médico</legend>
                    <div class="row m-3 g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="CRM">CRM: </label>
                            <input class="form-control" type="number" id="CRM" name="CRM" placeholder="Informe o CRM">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="especialidade">Especialidade: </label>
                            <input class="form-control" type="text" id="especialidade" name="especialidade"
                                placeholder="Informe a especialidade">
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
    <script src="../js/cadastraMedico.js"></script>
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

            /*Chama a função para cadastro de medico*/
            cadastraMedico();

            /*Chama função adiciona aba Minhas Consultas*/
            abaConsultas();
        }

    </script>
</body>


</html>
