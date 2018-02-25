<?php
include('Database.php');
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
$sql = "SELECT senha,ra FROM Aluno WHERE senha LIKE md5('$senha') AND ra LIKE '$ra';";




if(mysqli_num_rows(mysqli_query($link, $sql)) == 1)
{
    header("Location: cad_atividades.html"); }

else{

    echo "Usuário não encontrado. " . mysqli_error($link);

}