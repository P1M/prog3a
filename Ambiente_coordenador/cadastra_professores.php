<?php
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

$email = mysqli_real_escape_string($link, $_REQUEST['mail']);




// attempt insert query execution

$sql = "INSERT INTO Professor (email, nome) VALUES ('$email', '$nome')";


if(mysqli_query($link, $sql) and mysqli_query($link, $sql2)){

    echo '<script type="text/javascript">alert("Professor cadastrado com sucesso!"); window.location.href=cadastra_professores.html\';</script>';
    // redirect('cadastrar_professor.html');

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}









// close connection

mysqli_close($link);



