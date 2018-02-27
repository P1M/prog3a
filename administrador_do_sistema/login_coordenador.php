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
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$_SESSION["email"] = $email;
$sql = "SELECT senha,email FROM Senha,CoordenadorAdministrador WHERE senha LIKE md5('$senha') AND email LIKE '$email';";




if(mysqli_num_rows(mysqli_query($link, $sql)) == 1)
{
    header("Location: cadastra_atividades_coordenador.html"); }

else{

    echo "Usuário não encontrado. " . mysqli_error($link);

}