<?php
/**
 * Created by IntelliJ IDEA.
 * User: joao
 * Date: 23/02/18
 * Time: 22:01
 */
//apos inserir redireciona pagina php para a pagina q aparece todas as atividades listadas para submissao
//Header('Location: submeter_Relatorio_para_Avaliacao.html');
include('Database.php');
$db = Database::getInstance();
$link = $db->getConnection();
// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

session_start();
$titulo = mysqli_real_escape_string($link, $_REQUEST['titulo']);
$cargaHora = mysqli_real_escape_string($link, $_REQUEST['cargaHora']);
$maxPart = mysqli_real_escape_string($link, $_REQUEST['maxPart']);

$coordenador = $_SESSION["email"];
$sql = "INSERT INTO Tipo_Atividade (Atividade,CargaHoraria,LimiteParticipacao,CoordenadorAdministrador_email) VALUES ('$titulo', '$cargaHora', '$maxPart','$coordenador')";


if(mysqli_query($link, $sql)){

    echo "Records added successfully.";


} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

mysqli_close($link);
exit();
