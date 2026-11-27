<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Listagem de Alunos - Notas</title>
</head>
    <body>

        <div class="w3-margin"> 
        <!--
        Criada essa div para coloca a margin em todos os elementos 
        dela em relação ao body.

        Foi criado o input também que será o nosso filtro por aluno.
        -->   
            <h1>Lista de Alunos</h1>
            <hr class = "w3-gray" style = "width: 50%;">

            <label>Filtre o Aluno:</label>
            <input 
                class="w3-input w3-border w3-round w3-margin" 
                type="text" 
                id="txtFiltro" 
                placeholder="Filtrar por nome..."
                style="width: 50%;"
                onkeyup="filtrarTabela()"
            > <!-- sugestão da claude ia para fazer a busca/filtro por nome -->
            <p id="parNenhumAluno"></p>
        </div>



        <?php
        /*Atribuindo valores as 
        variáveis no php para formar a conexão ao banco de dados*/
        $servername = "localhost";
        $username = "root";
        $password = "";
        /*senha em branco pois nao defini quando fiz a instalação do 
        phpmyadmin, entendo que em uma situação real não pode ser feita
        dessa forma*/
        $dbname = "pwii";
        $conexao = new mysqli($servername, $username, $password, $dbname);

         if ($conexao->connect_error) {
            die("Connection failed: " . $conexao->connect_error);
            /*Caso de um erro na conexão*/
        }

    /*Abaixo montamos a tabela de exibição dos alunos e suas respectivas 
    notas com base na atividade você no comando.
    */
     echo '
        <div class="w3-paddingw3-content w3-half w3-displaytopmiddle w3-margin">
        <h1 class="w3-center w3-teal w3-round-large w3-
        margin">Listagem de alunos</h1>
        <table class="w3-table-all w3-centered" id="tabelaAlunos">
        <thead>
        <tr class="w3-center w3-teal">
        <th>Código</th>
        <th>Nome</th>
        <th>Nota 1</th>
        <th>Nota 2</th>
        <th>Nota 3</th>
        <th>Nota 4</th>
        <th>Media</th>
        </tr>
        </thead>
        <tbody>
        ';

            $sql = "SELECT *, (nota1+nota2+nota3+nota4)/4 /*
                solucao apresentada pela ia claude para calcular a media 
                sem criar uma nova coluna no banco de dados, onde faz o calculo
                da media definindo o alias media por exemplo e exibi-lo 
                no retorno da consulta
            */
                as media FROM alunoconcluinte order by media desc" ;
            $resultado = $conexao->query($sql);
            if($resultado != null){
                foreach($resultado as $linha) {
                echo '<tr>';
                echo '<td>'.$linha['idalunoconcluinte'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['nota1'].'</td>';
                echo '<td>'.$linha['nota2'].'</td>';
                echo '<td>'.$linha['nota3'].'</td>';
                echo '<td>'.$linha['nota4'].'</td>';
                echo '<td>'.number_format($linha['media'], 2).'</td>';
                /*colocando number format pra padronizar a exibição da media
                em duas casas decimais
                */
                echo '</tr>';
                }
            } else {
                echo 'Erro desconhecido';
                /*Colocando para exibir essa mensagem 
                caso de algum erro na hora de retornar a tabela 
                do banco de dados
                */
            }
            echo '
            </tbody>
            </table>
            </div>';
        
            $conexao->close(); // fechando a conexão

        ?>

        <!-- Script sugerido pela claude ia para filtrar os alunos -->
        <script>
            function filtrarTabela() {
                const filtro = document.getElementById('txtFiltro').value.toLowerCase();
                const linhas = document.querySelectorAll('#tabelaAlunos tbody tr');
                let encontrou = false; // controla se achou algum resultado

                linhas.forEach(linha => {
                    const nome = linha.cells[1].textContent.toLowerCase();
                    // linha.cells[1] para pegar a coluna do nome
                    //se fosse 0 por exemplo pegaria o codigo
                    if (nome.includes(filtro)) {
                        linha.style.display = '';
                        encontrou = true;
                    } else {
                        linha.style.display = 'none';
                    }
                });

                // exibe ou esconde a mensagem conforme o resultado
                document.getElementById("parNenhumAluno").innerHTML = 
                    encontrou ? '' : '<h4>Nenhum aluno encontrado com esse filtro</h4>';
            }
         </script>


    </body>

</html>