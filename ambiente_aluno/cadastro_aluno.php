<?php
/**
 * Created by IntelliJ IDEA.
 * User: abilene
 * Date: 19/02/18
 * Time: 17:45
 */
include 'Database.php';
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
$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
$cpf = mysqli_real_escape_string($link, $_REQUEST['cpf']);
$email = mysqli_real_escape_string($link, $_REQUEST ['email']);
$curso = mysqli_real_escape_string($link, $_REQUEST['curso']);
$senha = mysqli_real_escape_string($link, $_REQUEST ['senha']);
$senha = md5($senha);

$sql = "INSERT INTO aluno (RA,nome, cpf, email,curso,senha) VALUES ('$ra', '$nome', '$cpf',  '$email', '$curso', '$senha')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);


?>
