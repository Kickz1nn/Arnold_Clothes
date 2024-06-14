<?php
    mysqli_report(MYSQLI_REPORT_ERROR);
    $host = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bancoroupa";

    $conexao = @mysqli_connect($host, $user, $pass, $banco)
    or die ("<h3>Parece que estamos tendo problemas com a conexão ao Banco de Dados</h3>\n");
    mysqli_set_charset($conexao, "utf8");