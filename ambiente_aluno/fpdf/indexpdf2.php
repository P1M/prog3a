<?php

require_once('fpdf.php');

$pdf = new FPDF();

$pdf->AddPage(); // padrão o relatório gerado é no formato A4

$pdf->SetFont('Arial','B',16); // Arial, tamanho 16 em negrito, a fonte deve vir antes do texto

$pdf->cell(0,10,'OI POVO',1,0,'C'); 

 $pdf->ln(10);// pula 10 linhas, o valor 10 é por conta do valor da altura da célula

$pdf->cell(40,10,'OI  GENTE'); 
$pdf->Output(); //Saída para o navegador 

?>
