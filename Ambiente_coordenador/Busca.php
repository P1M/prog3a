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

    die("ERROR: Could not connect. ".mysqli_connect_error());

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

//Salva o valor da colua, do primeiro registro encontrado nas tabelas
$total = mysql_result($query, 0, $total);

//calcula o maximo de paginas
$paginas = (($total%$porPaginas) > 0) ? (int)($total/$porPaginas) + 1 : ($total / $porPaginas);

if (isset($_GET['pagina'])){
    $pagina = (int)$_GET['pagina'];
}else{
    $pagina = 1;

}

$pagina = max(min($paginas, $pagina), 1);
$offset = ($pagina - 1)*$porPaginas;


// Monta outra consulta MySQL, agora a que fará a busca com paginação
$cont = "SELECT * FROM `Aluno`, `Atividades` WHERE {$verifica} ORDER BY `Resultado Busca` DESC LIMIT {$offset}, {$por_pagina}";

// Executa a consulta
$query = mysql_query($cont);



//Comecando a exibir os resultados na tela
echo "Resultados ".min($total, ($offset + 1))." - ".min($total, ($offset + $porPaginas))." de ".$total." resultados encontrados para '".$_GET['busca1']."'";

echo "<ul>";
while ($resultado = mysql_fetch_assoc($query)) {
    $Nome = $resultado['nome'];
    $registro = $resultado['RA'];
    $curso = $resultado['curso'];
    $status = $resultado['Status'];

    $li;

    echo "<li>";
    echo "<input type='text' name='resultados' value='<?=$Nome?>' readonly='readonly'>"
    echo "<input type='text' name='resultados' value='<?=$registro?>' readonly='readonly'>"
    echo "<input type='text' name='resultados' value='<?=$curso?>' readonly='readonly'>"
    echo "<input type='text' name='resultados' value='<?=$status?>' readonly='readonly'>"
  echo "</li>";
}
echo "</ul>";


// Links de paginação
// Começa a exibição dos paginadores
if ($total > 0) {
    for ($n = 1; $n <= $paginas; $n++) {
        echo "<a href='busca.php?consulta={$_GET['consulta']}&pagina={$n}'>{$n}</a>";
    }
}