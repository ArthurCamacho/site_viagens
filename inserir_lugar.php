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
            isset($_POST['pais'])
        ){
            # Vai verificar se o email e a senha estão de acordo com o banco

            # Limpa as variáveis
            $nome = limpar($_POST['nome']);
            $pais = limpar($_POST['pais']);
            
            # Estrutura o select que ira verificar as credencias no banco de dados
            $query = "INSERT INTO lugares  (nome,
                                            pais,
                                            statusId)
                            VALUES ('$nome',
                                    '$pais',
                                    1)";

            # Executa a query
            $conn->exec($query);
            
            header("location: gerenciar_lugares.php");
            
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