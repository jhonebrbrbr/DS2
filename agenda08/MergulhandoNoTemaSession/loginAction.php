<?php require_once ('cabecalho.php'); ?>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle" >
    <?php
    session_start();    
    $nome = $_POST['txtNome'];
    $senha = $_POST['txtSenha'];
       require_once 'conexaoBD.php';
       $sql = "SELECT * FROM usuario WHERE nome =  '".$nome."';";
       $resultado = $conexao->query($sql);
       //echo $sql;
       $linha = mysqli_fetch_array($resultado);
       if($linha != null)
        {
            if($linha['senha'] == $senha)
            {
                echo '
                <a href="principal.php">
                    <h1 class="w3-button w3-teal">'.$nome.', Seja Bem-Vinda!<br>
                    Clique para Continuar  </h1>
                </a> 
                ';
                /*Colocado a mensagem clique para continar para deixar mais intuitivo*/
                $_SESSION['logado'] = $nome;
            }
            else /*Feita  a melhoria na mensagem / botão do login invalido*/
            {
                echo '
                <a href="index.php">
                    <h1 class="w3-button w3-teal">Login Inválido!<br> 
                        Clique para voltar a Página inicial.
                    </h1>
                </a> 
                ';
            }
        }
        else
        {
            echo '
            <a href="index.php">
                    <h1 class="w3-button w3-teal">Login Inválido!<br> 
                        Clique para voltar a Página inicial.
                    </h1>
            </a> 
            ';
        }
        $conexao->close();
    ?>
</div>
<?php require_once ('rodape.php'); ?>