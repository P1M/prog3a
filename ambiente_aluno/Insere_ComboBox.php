<?php
include('Database.php');
    $db = Database::getInstance();
    $link = $db->getConnection();
$rs = mysqli_query($link, "SELECT * FROM Tipo_Atividade");

echo "<select name='cidade'>";
while ($reg = mysqli_fetch_object($rs)) {
    echo "<option value='$reg->Atividade'>$reg->Atividade</option>";
}
echo "</select>";

?>