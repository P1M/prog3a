

<?php

/* Attempt MySQL server connection. Assuming you are running MySQL

server with default setting (user 'root' with no password) */


//$link = mysqli_connect("localhost", "root", "123pimpim", "prog3");

include ('Database.php');
$db = Database::getInstance();
$link = $db->getConnection();
// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}



// Escape user inputs for security

$name = mysqli_real_escape_string($link, $_REQUEST['name']);

$email = mysqli_real_escape_string($link, $_REQUEST['email']);

$senha = mysqli_real_escape_string($link, $_REQUEST['senha']);
$senha = md5($senha);



// attempt insert query execution

$sql = "INSERT INTO CoordenadorAdministrador (nome,email,tipo) VALUES ('$name', '$email', '1')";

$sql2 = "INSERT INTO Senha (senha,CoordenadorAdministrador_email) VALUES ('$senha', '$email')";

if(mysqli_query($link, $sql)){

    echo "Records added successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

if(mysqli_query($link, $sql2)){

    echo "Records added successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}


// close connection

mysqli_close($link);


