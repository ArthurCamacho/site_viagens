<?php
require_once("conexao.php");
require_once("funcoes.php");

try{
    # Verifica se o metodo da requisição é post
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        # Vai verificar se as informações necessárias estão presentes na requisição
        if(
            isset($_POST['cpf']) &&
            isset($_POST['senha'])
        ){
            # Vai verificar se o cpf e a senha estão de acordo com o banco

            # Limpa as variáveis
            $cpf = limpar($_POST['cpf']);
            $senha = limpar($_POST['senha']);
            
            # Estrutura o select que ira verificar as credencias no banco de dados
            $query = "SELECT *
                        FROM pessoas
                       WHERE cpf = ?
                         AND senha = ?";

            # Cria um statement para preparar a query com os parametros necessários
            $stmt = $conn->prepare($query);

            # Seta os parametros necessários
            $stmt->bindParam(1, $cpf, PDO::PARAM_STR);
            $stmt->bindParam(2, $senha, PDO::PARAM_STR);

            # Executa a query
            $stmt->execute();

            # Verifica se há somente um alinha como resultado do select
            if($stmt->rowcount() == 1){
                # Armazena os dados obtidos em uma variável
                # Os dados são acessados pelo nome de suas coluas (Como um dicionario em python)
                $linha = $stmt->fetch(PDO::FETCH_ASSOC);

                # Verifica se o status do usuário é ativo
                if($linha['statusId'] == 1){
                    # Coloca variáveis que poderão ser úteis futuramente salvas dentro da variavel $_SERVER
                    session_start();
                    $_SESSION['nome'] = $linha['nome'];
                    $_SESSION['funcaoId'] = $linha['funcaoId'];
                    $_SESSION['idPessoa'] = $linha['idPessoa'];
                    $_SESSION['statusId'] = $linha['statusId'];

                    # Redireciona para o inicio após o login
                    header('location: index.php');
                }
                else{
                    echo "<p>Seu usuario esta desativado</p>";
                }
            }
            else{
                echo "<p>Cadastro de usuario inconsistente</p>";
            }
        }
        else{
            echo "<p>Formulario de login incompleto</p>";
        }
    }
    else{
        echo "<p>Metodo inesperado para o endpoint</p>";
    }
}
catch(Exception $e){
    echo "<p>Ocorreu um erro inesperado</p>";
}
?>