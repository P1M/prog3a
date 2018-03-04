<?php

//Verificando se tem alguma coisa escrito no campo de busca, se nao tiver redireciona para o Home
if(!isset($_GET['consulta'])){
    header("Location /");
    exit;
}


//iniciando a conexao
include('Database.php');
$db = Database::getInstance();
$link = $db->getConnection();

// Verificando a conexao
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

$buscando = mysqli_real_escape_string($_GET['busca1']);

//Registros por pagina
$porPaginas = 20;

//Montando a verificacao que contara quantos registros existem no banco de dados
$verifica = "(`nome` LIKE '%{$buscando}%' OR ('%{$buscando}%'))";

//faz a contagem da quantidade de nomes no banco de dados
$cont = "SELECT COUNT(*) AS qntPg from `Professor`, `Aluno` WHERE {$verifica}";

//Executando a consulta
$query = mysqli_query($cont);


