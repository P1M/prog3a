

<?php

/* Attempt MySQL server connection. Assuming you are running MySQL

server with default setting (user 'root' with no password) */


//$link = mysqli_connect("localhost", "root", "pp", "prog3");

include('Database.php');
$db = Database::getInstance();
$link = $db->getConnection();
// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}



// Escape user inputs for security

//$_SESSION["logado"] = TRUE;

$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);

$email = mysqli_real_escape_string($link, $_REQUEST['email']);

$senha = mysqli_real_escape_string($link, $_REQUEST['senha']);
$senha = md5($senha);



// attempt insert query execution

$sql = "INSERT INTO CoordenadorAdministrador (nome,email,tipo) VALUES ('$nome', '$email', '1')";

$sql2 = "INSERT INTO Senha (senha,CoordenadorAdministrador_email) VALUES ('$senha', '$email')";

if(mysqli_query($link, $sql) and mysqli_query($link, $sql2)){

    echo '<script type="text/javascript">alert("Coordenador cadastrado com sucesso!"); window.location.href=cadastrar_professor.html/script>';
   // redirect('cadastrar_professor.html');

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}









// close connection

mysqli_close($link);



