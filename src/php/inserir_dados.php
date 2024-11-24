<?php

include 'conexao.php';
include 'formulario.php';
// $stmt = $conn->prepare("INSERT INTO alunos (nome_aluno) VALUES ($nome)");
$stmt->bindParam(':nome', $nome);
