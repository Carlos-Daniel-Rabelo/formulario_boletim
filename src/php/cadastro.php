<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo 'Dados enviados via POST <br>';
};
?>