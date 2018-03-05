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
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$_SESSION["email"] = $email;

$sql = "SELECT CoordenadorAdministrador.email, Senha.senha
FROM CoordenadorAdministrador
LEFT JOIN Senha ON CoordenadorAdministrador.email LIKE Senha.CoordenadorAdministrador_email
WHERE Senha.senha LIKE md5('$senha')
AND CoordenadorAdministrador.email LIKE '$email'
AND CoordenadorAdministrador.tipo LIKE '2' ;";


if(mysqli_num_rows(mysqli_query($link, $sql)) == 1)
{
    header("Location: cadastrar_coordenador.html");

}else{

    echo "Usuário não encontrado. " . mysqli_error($link);

}