
<?php

include 'Database.php';


$titulo = $_POST['titulo'];
$cargaHora = $_POST['cargaHora'];
$ano = $_POST['ano'];
$tipo = $_POST ['tipo'];

$sql = "INSERT INTO cadastro VALUES ";
$sql .= "('$titulo', '$cargaHora', '$ano', '$tipo')";


if($conexao->query($sql)  === true){
    echo "Atividade cadastrada com sucesso!";

}else{
    echo "erro: " . $sql . "<br>" . $conexao->error;
}

$conexao->close() ;

?>
