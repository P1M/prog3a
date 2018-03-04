<?php
include('Database.php');
$db = Database::getInstance();
$link = $db->getConnection();
// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

session_start();

$ra = mysqli_real_escape_string($link, $_REQUEST['ra']);
$_SESSION["ra"] = $ra;
$sql = "INSERT INTO ALUNO (travado) VALUES ('sim') WHERE ALUNO.RA = $ra;";

echo $ra;
mysqli_query($link, $sql);

