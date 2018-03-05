<?php	

	include_once("conexao.php");
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
	$html .= '<tbody>';
	
	$result_transacoes = "SELECT * FROM transacoes";
	$resultado_trasacoes = mysqli_query($conn, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td>'.$row_transacoes['id'] . "</td>";
		$html .= '<td>'.$row_transacoes['transacao_cod'] . "</td>";
		$html .= '<td>'.$row_transacoes['tipo_pagamento'] . "</td>";
		$html .= '<td>'.$row_transacoes['status_transacao'] . "</td>";
		$html .= '<td>'.$row_transacoes['email'] . "</td></tr>";		
	}
	
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Celke - Relatório de Transações</h1>
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

//outra forma de fazer
<?php
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Celke - Gerar PDF</h1>
			<p>Donec viverra erat sed eros tristique venenatis. Suspendisse vulputate tortor eget nulla tincidunt semper. Fusce ac sodales sem. Maecenas quis massa ut nisi dictum ultrices. Nunc quis tortor tortor. In quis ante vel enim efficitur scelerisque. Vestibulum rutrum mauris mattis ligula blandit, at imperdiet odio interdum. Proin luctus interdum nisi. Etiam sapien augue, aliquam vel augue et, tristique placerat tortor. Sed in porttitor urna, et fringilla libero. Curabitur mollis sodales blandit.</p>

			<p>Nulla at leo in risus varius sagittis. Aliquam ullamcorper lectus ultrices tempus mattis. Nunc dapibus lorem ut efficitur cursus. Duis ac sem sed diam pulvinar interdum at nec dolor. Proin nibh augue, efficitur ornare nibh lobortis, pretium fermentum erat. Aliquam in diam faucibus, consectetur orci non, ultrices ex. Mauris auctor urna in eleifend malesuada. Aenean sit amet laoreet turpis. Proin ac ante mi. Vivamus aliquam quis erat non porttitor. Sed efficitur turpis suscipit massa pretium, eget viverra erat luctus. Curabitur rutrum arcu at massa pretium, ac sodales mauris elementum. Curabitur id odio et velit accumsan interdum. Nulla facilisi.</p>
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