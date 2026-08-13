<?php
echo '<br><br><br>';
echo '<link rel="stylesheet" href="w3.css">';
echo "Nome Completo: ".$_POST['nome_completo']."<br>";
echo "Idade: ".$_POST['idade']."<br>";
echo "Profissão: ".$_POST['profissao']."<br>";
echo "Salário: R$ ".$_POST['salario']."<br>";
echo "Experiência Anterior: ".$_POST['Exp_Anterior']."<br>";
echo '<br>';
echo '<a href="cadastro.html">';
echo '<button class="w3-button w3-cyan w3-round-small">Voltar ao formulário</button>';
echo '</a> ';
?>
