

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




// attempt insert query execution

$sql = "INSERT INTO Professor (nome,email) VALUES ('$nome', '$email');";


if(mysqli_query($link, $sql)){

    echo  "<script>alert('Professor cadastrado com Sucesso!');</script>";
    echo '<script type="text/javascript">
           window.location = "cadastrar_professor.html"
      </script>';
} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}









// close connection

mysqli_close($link);



