<?php
include('../Database.php');
$db = Database::getInstance();
$link = $db->getConnection();
// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

session_start();

$ra = $_SESSION["ra"];

$sql = "UPDATE Aluno SET travado = 'sim' WHERE RA = $ra;";

mysqli_query($link, $sql);

