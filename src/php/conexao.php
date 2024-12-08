<?php

// Você deve habilitar o relatório de erros para mysqli antes de tentar fazer uma conexão 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Estilo processual (fazendo a conexão com o servidor de banco de dados)
$mysqli = new mysqli('localhost', 'root', '', 'boletim');

// Defina o conjunto de caracteres desejado após estabelecer uma conexão
$mysqli->set_charset('utf8mb4');

?>