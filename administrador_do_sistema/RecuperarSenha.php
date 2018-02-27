<?php
include('Database.php');
$db = Database::getInstance();
$link = $db->getConnection();
// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$sql = "SELECT email FROM CoordenadorAdministrador WHERE email LIKE '$email';";




    if(mysqli_num_rows(mysqli_query($link, $sql)) == 1)
    {
        echo "Usuário existe";
    }

 else{

    echo "Usuário não encontrado. " . mysqli_error($link);

}