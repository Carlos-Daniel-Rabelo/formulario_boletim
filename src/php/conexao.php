<?php
// declarando as variáveis para conectar ao banco de dados em seguida
$host = "localhost";
$user = "root";
$password = "";
$dbname = "boletim";

// criando a conexão com o banco de dados
$con = new mysqli($host, $user, $password, $dbname);

// verificando se ocorreu algum erro na conexão com o banco
if ($con->connect_error){
    die("Conexão Falhou" . $con->connect_error);
}

// exibindo mensagem na pagina
echo "Conectado com sucesso <br>";

// inserindo os dados do formulario nas tabelas e respectivas colunas
$stmt->prepare("INSERT INTO alunos(nome_aluno) VALUES ($nome)");

$stmt->prepare("INSERT INTO turmas(numero_turma) VALUES ($turma)");

$stmt->prepare("INSERT INTO notas(nota_exigida) VALUES ($nota_exigida)");

$stmt->prepare("INSERT INTO notas(bimestre_1, bimestre_2, bimestre_3, bimestre_4) VALUES ($bimestre_1, $bimestre_2, $bimestre_3, $bimestre_4)");


$stmt->prepare("INSERT INTO bimestres(situacao_1, situacao_2, situacao_3, situacao_4) VALUES ($situacao_1, $situacao_2, $situacao_3, $situacao_4)");

$stmt->prepare("INSERT INTO bimestres(aproveitamento_ano) VALUES ($aproveitamento_ano)");

$stmt->prepare("INSERT INTO bimestres(situacao_ano) VALUES ($situacao_ano)");
