<?php
require_once("conexao.php");
require_once("funcoes.php");

try{
    # Verifica se o metodo da requisição é post
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        # Vai verificar se as informações necessárias estão presentes na requisição
        if(
            isset($_POST['email']) &&
            isset($_POST['email']) &&
            isset($_POST['nomeCompleto']) &&
            isset($_POST['dataNascimento']) &&
            isset($_POST['cpf'])
        ){
            # Vai verificar se o email e a senha estão de acordo com o banco

            # Limpa as variáveis
            $email = limpar($_POST['email']);
            $senha = limpar($_POST['senha']);
            $nome = limpar($_POST['nomeCompleto']);
            $cpf = limpar($_POST['cpf']);
            $senha = limpar($_POST['senha']);
            $dataNascimento = $_POST['dataNascimento'];
            
            # Estrutura o select que ira verificar as credencias no banco de dados
            $query = "INSERT INTO usuarios (nome,
                                            email,
                                            senha,
                                            cpf,
                                            data_nascimento,
                                            status)
                            VALUES ('$nome',
                                    '$email',
                                    '$senha',
                                    '$cpf',
                                    '$dataNascimento',
                                    1)";

            # Executa a query
            $conn->exec($query);

            echo '<p>Cadastrado com sucesso! <a href="../login.php">Clique aqui</a> para fazer login</p>';
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