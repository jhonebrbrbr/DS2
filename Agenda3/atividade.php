<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Agenda 3</title>
</head>
	<body>
	        
			
			
		<div style="width: 60%; margin: 0 auto;"> <!-- Usado o margin: 0 auto para centralizar o form-->
		    <br>
			<h1> Formulário de compra:</h1>
		    <br><br>
			<form method="post">
				<label class="w3-large" >Nome do Cliente:</label>
				<input class="w3-input w3-border" name="txtNome" type="text" required="yes"><br>
				<label class="w3-large">Valor da Compra:</label>
				<input class="w3-input w3-border" name="txtValorCompra" type="number" step="0.01" required="yes"><br>
				<!-- Usado o step para aceitar numeros decimais no valor, fonte:  https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/number 
					 Usei também o required para evitar enviar o forumlario sem os dados-->
				<label class="w3-large" >Selecione a Forma de Pagamento:</label>
				<select class="w3-input w3-border" id="regiao" name = "cmbPag">
					<option value="cartaoCredito">Cartao de Crédito</option>
					<option value="boleto">Boleto</option>
					<option value="deposito">Depósito</option>
				</select>
				<br><button class="w3-btn w3-blue-grey w3-round-large">Finalizar Compra</button>
			</form>
        
		    
					
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$nome = $_POST["txtNome"];
					$valorCompra = $_POST["txtValorCompra"];
					$formaPagamento = $_POST["cmbPag"];
					$desconto = 0;

					
					if ($formaPagamento == "cartaoCredito") {
						$desconto = 0;
						$mensagem = "Olá $nome, sua compra de R$ ".number_format($valorCompra,2,",","."). " foi realizada com cartão de crédito. <br>Não há desconto.";
					} elseif ($formaPagamento == "boleto") {
						$desconto = $valorCompra * 0.08; 
						$valorCompraFinal = $valorCompra - $desconto; 
						$mensagem = "Olá $nome, sua compra de R$ ". number_format($valorCompra,2,",",".")." foi realizada com Boleto. <br>Seu desconto é de R$ " .number_format($desconto,2,",","."). "<br>Valor final da compra é de R$". number_format($valorCompraFinal,2,",",".");
					} elseif ($formaPagamento == "deposito") {
						$desconto = $valorCompra * 0.1; 
						$valorCompraFinal = $valorCompra - $desconto; 
						$mensagem = "Olá $nome, sua compra de R$ ". number_format($valorCompra,2,",",".")." foi realizada com Depósito. <br>Seu desconto é de R$ " .number_format($desconto,2,",","."). "<br>Valor final da compra é de R$ ". number_format($valorCompraFinal,2,",",".");
					    /*Usado o number_format para padronizar em duas casas decimais, fonte: https://www.w3schools.com/php/func_string_number_format.asp*/
					} else {
						$mensagem = "Forma de pagamento inválida.";
					}
					
					echo "<br><div class='w3-panel w3-light-gray w3-large'>$mensagem</div>";
				}
		    ?>	
		</div>
	</body>
     <!--
	 De uma forma geral demorei um pouco a entender que o formulário e o php deviam ser no mesmo arquivo, 
	 nessa atividade não usei ia, pesquisei os formatos nas fontes citadas.
	 Tentei deixar o visual mais simples possível porém aplicando os estilos do w3.css pensando em uma situação real.
	 
	 No processamento do desconto, criei uma variavel $valorCompraFinal, onde essa faz a operação de subtrair o $desconto do $valorCompra
	 
	 na mensagem final para as formas de pagamento que possuem desconto, mostrei o valor da compra, o desconto e o valor final la com o desconto.
	 -->
	 
</html>