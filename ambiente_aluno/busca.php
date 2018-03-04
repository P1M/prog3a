<?php

    //Verifica se foi feita alguma busca, caso contrario redireciona o usuario para a Home
    if(!isset($_GET['busca1'])){
        header("Location /");
        exit;
    }


    //conexao com o sql
    $host = "localhost";
    $user = "";

    //Fazendo a tentativa da conexao com o banco de dados
    mssql_select_db() or die(mssql_get_last_message())


    $buscar = mysql_real_escape_string()
