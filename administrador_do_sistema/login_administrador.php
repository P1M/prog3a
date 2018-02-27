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

$sql = "SELECT senha FROM Senha WHERE senha LIKE md5('$senha');";




if(mysqli_num_rows(mysqli_query($link, $sql)) > 0)
{
    header("Location: cadastra_coordenador.html"); }

else{

    echo "Usuário não encontrado. " . mysqli_error($link);

}