

<?php

/* Attempt MySQL server connection. Assuming you are running MySQL

server with default setting (user 'root' with no password) */


//$link = mysqli_connect("localhost", "root", "123pimpim", "prog3");

include('Database.php');
$db = Database::getInstance();
$link = $db->getConnection();
// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}


// Escape user inputs for security

$ra = mysqli_real_escape_string($link, $_REQUEST['ra']);

//$_SESSION["logado"] = TRUE;

$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);

$cpf = mysqli_real_escape_string($link, $_REQUEST['cpf']);

$email = mysqli_real_escape_string($link, $_REQUEST['email']);

$curso = mysqli_real_escape_string($link, $_REQUEST['curso']);

$senha = mysqli_real_escape_string($link, $_REQUEST['senha']);
$senha = md5($senha);



// attempt insert query execution

$sql = "INSERT INTO Aluno (RA,nome,cpf,email,curso,senha) VALUES ('$ra', '$nome', '$cpf','$email','$curso','$senha')";


if(mysqli_query($link, $sql)){

    header("Location: login_aluno.html");


} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}


// close connection

mysqli_close($link);



