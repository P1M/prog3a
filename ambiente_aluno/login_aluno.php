<?php
include('../Database.php');
$db = Database::getInstance();
$link = $db->getConnection();
// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

session_start();

$senha = mysqli_real_escape_string($link, $_REQUEST['senha']);
$ra = mysqli_real_escape_string($link, $_REQUEST['ra']);
$_SESSION["ra"] = $ra;
$sql2 = "SELECT Atividade FROM Tipo_Atividade;";

$atividades = mysqli_query($link, $sql2);
$_SESSION["atividades"] = $atividades;

$sql = "SELECT senha,ra FROM Aluno WHERE senha LIKE md5('$senha') AND ra LIKE '$ra';";


//echo $ra;

if(mysqli_num_rows(mysqli_query($link, $sql)) == 1)
{

    $rs = mysqli_query($link, "SELECT travado FROM Aluno WHERE Aluno.travado LIKE 'sim' and Aluno.RA LIKE $ra;");
    $row = mysqli_fetch_array($rs);
    if ('sim' == $row['travado']){
       header("Location: lista_atividades.phtml");
    }else{

        header("Location: cadastra_atividades_aluno.phtml");
    }

}else{

    echo "Usuário não encontrado. " . mysqli_error($link);

}