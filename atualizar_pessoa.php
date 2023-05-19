<?php
require_once("conexao.php");
require_once("funcoes.php");
session_start();

try{
    # Verifica se o metodo da requisição é post
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        # Vai verificar se as informações necessárias estão presentes na requisição
        if(
            isset($_POST['nome']) &&
            isset($_POST['cpf']) &&
            isset($_POST['cep']) &&
            isset($_POST['rua']) &&
            isset($_POST['numeroPredio']) &&
            isset($_POST['bairro']) &&
            isset($_POST['cidade']) &&
            isset($_POST['estado']) &&
            isset($_POST['senha']) &&
            isset($_POST['telefone'])
        ){
            # Vai verificar se o email e a senha estão de acordo com o banco

            # Limpa as variáveis
            $nome = limpar($_POST['nome']);
            $cpf = limpar($_POST['cpf']);
            $cep = limpar($_POST['cep']);
            $rua = limpar($_POST['rua']);
            $numeroPredio = limpar($_POST['numeroPredio']);
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $senha = $_POST['senha'];
            $telefone = $_POST['telefone'];
            
            # Estrutura o select que ira verificar as credencias no banco de dados
            $query = "UPDATE pessoas 
                         SET nome ='$nome',
                             cpf ='$cpf',
                             rua ='$rua',
                             numeroPredio ='$numeroPredio',
                             cep ='$cep',
                             bairro ='$bairro',
                             cidade ='$cidade',
                             estado ='$estado',
                             telefone ='$telefone',
                             senha ='$senha'
                       WHERE idPessoa = {$_POST['id']}";
            
            $conn->exec($query);
            
            if(isset($_POST['funcao'])){
                $query = "UPDATE pessoas 
                             SET funcaoId = {$_POST['funcao']}
                           WHERE idPessoa = {$_POST['id']}";

                $conn->exec($query);

            }

            header("location: gerenciar_usuarios.php");

        }   
        else{
            echo "<p>Formulario de cadastro incompleto</p>";
        }
    }
    else{
        echo "<p>Metodo inesperado para o endpoint</p>";
    }
}
catch(Exception $e){
    echo "<p>Ocorreu um erro inesperado</p><br>
          '$e'";
}
?>