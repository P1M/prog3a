<?php
/**
 * Created by IntelliJ IDEA.
 * User: joao
 * Date: 23/02/18
 * Time: 22:01
 */

include('Database.php');
$db = Database::getInstance();
$link = $db->getConnection();
// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

$titulo = mysqli_real_escape_string($link, $_REQUEST['titulo']);
$cargaHora = mysqli_real_escape_string($link, $_REQUEST['cargaHora']);
$ano = mysqli_real_escape_string($link, $_REQUEST['ano']);
$tipo = mysqli_real_escape_string($link, $_REQUEST['tipo']);

$sql = "INSERT INTO Atividades (Titulo,CargaHoraria,Ano,Tipo,Status,Aluno_RA) VALUES ('$titulo', '$cargaHora', '$ano','$tipo','submetido','1')";


if(mysqli_query($link, $sql)){

    echo "Records added successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

mysqli_close($link);
