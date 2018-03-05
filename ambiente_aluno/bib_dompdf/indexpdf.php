<?php	

	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>COD Transação</th>';
	$html .= '<th>Tipo de Pagamento</th>';
	$html .= '<th>Status da Transação</th>';
	$html .= '<th>E-mail</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody> AQUIVO GERADO EM PDF';
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require __DIR__ . '\autoload.inc.php';

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Relatório de Transações</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
