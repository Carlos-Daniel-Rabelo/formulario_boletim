<?php

// Declaração preparada, etapa 1: preparar
$stmt = $mysqli->prepare("INSERT INTO alunos(nome_aluno) VALUES (?);");
// Declaração preparada, estágio 2: vincular e executar
$stmt->bind_param("s", $nome);
$stmt->execute();
$stmt->close();

$stmt = $mysqli->prepare("INSERT INTO turmas(numero_turma) VALUES (?);");
$stmt->bind_param("i", $turma);
$stmt->execute();
$stmt->close();

// $stmt = $mysqli->prepare("INSERT INTO notas(nota_exigida) VALUES (?);");
// $stmt->bind_param("d" $nota_exigida);
// $stmt->execute();
// $stmt->close();

// $stmt = $mysqli->prepare("INSERT INTO notas(bimestre_1) VALUES (?);");
// $stmt->bind_param("d" $bimestre_1);



?>