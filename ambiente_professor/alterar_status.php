<?php
include('../Database.php');
$db = Database::getInstance();
$link = $db->getConnection();
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$RA = mysqli_real_escape_string($link, $_REQUEST['RA']);
$titulo = mysqli_real_escape_string($link, $_REQUEST['titulo']);
$novoStatus = mysqli_real_escape_string($link, $_REQUEST['novoStatus']);

$sql = "UPDATE Atividades
SET Status = $novoStatus
WHERE Atividades.Aluno_RA LIKE $RA AND Atividades.Titulo LIKE $titulo;";


?>

 <form id="formulario" name="formulario" method="get" action="recebe_link_e_avalia.phtm">
  Nome: <input id="nome" name="nome" type="hidden" value="<?php echo dechex($RA); $?>" />
  <input id="btnenviar" name="btnenviar" type="submit" value="Voltar" />
 </form>
