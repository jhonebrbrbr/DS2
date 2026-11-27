<!DOCTYPE html> 
<html lang="pt-BR"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
        <title>Agenda 4 Action PHP</title> 
    </head>
<body>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                        

        $nome = array("Joao", "Lucas", "Pedro", "Enzo", "Gabriel");
        shuffle($nome);
        $cpf = array("123.456.789-10","123.456.459-10","223.456.789-10","123.456.789-45","123.456.789-65");
        shuffle($cpf);
        $data = array("22/10/1970","23/05/1984","10/04/2000","11/06/1995","31/01/1970");
        shuffle($data);
        $cep = array("12345-789","78965-321","20321-482","32541-874","74125-654");
        shuffle($cep);
        $Log = array("Rua das mangas","Rua uva","Rua maçã","Rua Laranja","Rua limão");
        shuffle($Log);
        $numero = array("456","789","546","201","123");
        shuffle($numero);
        $bairro = array("Limoeiro","Macieiras","Parreira","Mangueiras","Laranjeiras");
        shuffle($bairro);
        $qtd = $_POST["txtQtd"];

        echo '<a href="agenda4.html" class="w3-button">Clique para voltar</a><br><br>'; 

        /*
        para mostrar os dados do cliente cadastrado, utilizei no echo a variavel
        $nome[$i] para mostrar de acordo com a posição no array
        */

		for ($i = 0; $i < $qtd;$i++) {

            echo '<div class="w3-green w3-container">';
            echo "<strong>Cliente : " . $i+1 . "</strong><br><br>"; // para mostrar o numero do cliente correto por isso o $i+1
			echo "Nome: " . $nome[$i] . "<br>";
			echo "CPF: " . $cpf[$i] . "<br>";
			echo "Data: " . $data[$i] . "<br>";
			echo "CEP: " . $cep[$i] . "<br>";
			echo "Logradouro: " . $Log[$i] . "<br>";
			echo "Número: " . $numero[$i] . "<br>";
			echo "Bairro: " . $bairro[$i] . "<br>";
            echo '</div>';
			echo "<hr>";
		
		}
    }      
?>
</body>
</html>
