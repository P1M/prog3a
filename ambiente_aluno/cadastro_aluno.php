<?php
/**
 * Created by IntelliJ IDEA.
 * User: abilene
 * Date: 19/02/18
 * Time: 17:45
 */

include 'Database.php';


$ra = $_POST['ra'];
$curso = $_POST['curso'];
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST ['email'];
$senha = $_POST ['senha'];

$sql = "INSERT INTO cadastro VALUES ";
$sql .= "('$ra', '$nome', '$cpf',  '$email', '$curso', '$senha')";


if($conexao->query($sql)  === true){
    echo "Aluno cadastrado com sucesso!";

}else{
    echo "erro: " . $sql . "<br>" . $conexao->error;
}

$conexao->close() ;

?>
