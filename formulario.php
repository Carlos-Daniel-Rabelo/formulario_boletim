<?php

session_start();

// Verifica se os dados foram enviados via POST e salva nas variáveis de sessão
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Nome e turma
    $nome = $_POST["nome"];
    $turma = $_POST["turma"];

    // Notas de cada bimestre
    $bimestre_1 = $_POST["bimestre_1"];
    $bimestre_2 = $_POST["bimestre_2"];
    $bimestre_3 = $_POST["bimestre_3"];
    $bimestre_4 = $_POST["bimestre_4"];

    // Nota exigida por bimestre
    $nota_exigida = $_POST["nota_exigida"];

    // Somando notas do bimestres e calculando a média final 
    $media_final = ($bimestre_1 + $bimestre_2 + $bimestre_3 + $bimestre_4) / 4;

    // Aproveitamento em percentual
    $aproveitamento_ano = $media_final * 10 / 10;
};


function avaliar($nota) {
    if ($nota >= 8 && $nota <= 10) {
        return "EXCELENTE";
    } elseif ($nota >= 6 && $nota < 8) {
        return "BOM";
    } elseif ($nota >= 4 && $nota < 6) {
        return "RUIM";
    } elseif ($nota >= 1 && $nota < 4) {
        return "PÉSSIMO";
    } else {
        return "$nota INVÁLIDO";
    }
};

$situacao_1 = avaliar($bimestre_1);
$situacao_2 = avaliar($bimestre_2);
$situacao_3 = avaliar($bimestre_3);
$situacao_4 = avaliar($bimestre_4);

$situacao_ano = avaliar($aproveitamento_ano);

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