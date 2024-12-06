<?php

session_start();

// Verifica se os dados foram enviados via POST e salva nas variáveis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo 'Dados enviados via POST <br>';
};

// Nome e turma
$nome = $_POST["nome"];
$turma = $_POST["turma"];

// Notas de cada bimestre
$bimestre_1 = (float) $_POST["bimestre_1"];
$bimestre_2 = (float) $_POST["bimestre_2"];
$bimestre_3 = (float) $_POST["bimestre_3"];
$bimestre_4 = (float) $_POST["bimestre_4"];

// Nota exigida por bimestre
$nota_exigida = (float) $_POST["nota_exigida"];

// Somando notas do bimestres e calculando a média final 
$media_final = ($bimestre_1 + $bimestre_2 + $bimestre_3 + $bimestre_4) / 4;

// Aproveitamento em percentual
$aproveitamento_ano = (float) $media_final * 10 / 10;

// session será um array de turmas e, por sua vez, cada turma será um array de alunos, os quais serão um array associativo, contendo matrícula, nome e notas (notas deve estar no formato de array).

$_SESSION["turmas"] = []; // session será um array de turmas

$_SESSION["turmas"] = [$turma => [],]; // cada turma será um array

$_SESSION["turmas"][$turma] = ["alunos" => []]; // turma será um array de alunos

$_SESSION["turmas"][$turma]["alunos"] = ["matricula" => "id_matricula", "nome" => $nome, "notas" => [$bimestre_1, $bimestre_2, $bimestre_3, $bimestre_4]]; // um array associativo, contendo matrícula, nome e notas

// echo "<pre>";
// var_dump($_SESSION);
// echo "<pre>";

function avaliar_nota($nota)
{
    if ($nota >= 8 && $nota <= 100) {
        return "EXCELENTE";
    } elseif ($nota >= 6 && $nota < 8) {
        return "BOM";
    } elseif ($nota >= 4 && $nota < 6) {
        return "RUIM";
    } elseif ($nota >= 1 && $nota < 4) {
        return "PÉSSIMO";
    } else {
        return "$nota NÃO É VALIDO";
    }
};

$situacao_1 = avaliar_nota($bimestre_1);
$situacao_2 = avaliar_nota($bimestre_2);
$situacao_3 = avaliar_nota($bimestre_3);
$situacao_4 = avaliar_nota($bimestre_4);

$situacao_ano = avaliar_nota($aproveitamento_ano);

echo "Nome do aluno: $nome <br>";
echo "Turma do aluno: $turma <br>";

echo "1° Bimestre: $bimestre_1 <br>";
echo "2° Bimestre: $bimestre_2 <br>";
echo "3° Bimestre: $bimestre_3 <br>";
echo "4° Bimestre: $bimestre_4 <br>";

echo "Nota exigida por bimestre: $nota_exigida <br>";
echo "Média final: $media_final <br>";

echo "1° Situação: $situacao_1 <br>";
echo "2° Situação: $situacao_2 <br>";
echo "3° Situação: $situacao_3 <br>";
echo "4° Situação: $situacao_4 <br>";

echo "Situação do ano: $situacao_ano <br>";

// Você deve habilitar o relatório de erros para mysqli antes de tentar fazer uma conexão 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Estilo processual (fazendo a conexão com o servidor de banco de dados)
$conexao = new mysqli('localhost', 'root', '', 'boletim');

// Defina o conjunto de caracteres desejado após estabelecer uma conexão
$conexao->set_charset('utf8mb4');

// Declaração preparada, etapa 1: preparar
$stmt = $conexao->prepare("INSERT INTO alunos(nome_aluno) VALUES (?)");

// Declaração preparada, estágio 2: vincular e executar
$stmt -> bind_param("s", $nome);

$stmt->execute();


// $conexao->close();


// $stmt = $conexao->prepare("INSERT INTO alunos (nome_aluno) VALUES (?)");
// $stmt->bindParam('s', $nome);
