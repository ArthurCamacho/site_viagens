<?php
require_once("conexao.php");
require_once("funcoes.php");
session_start();

try{
    # Verifica se o metodo da requisição é post
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        # Vai verificar se as informações necessárias estão presentes na requisição
        if(
            isset($_GET['id'])
        ){
            $pessoa = $_SESSION['idPessoa'];
            $viagem = $_GET['id'];
            # Estrutura o select que ira verificar as credencias no banco de dados
            $query = "INSERT INTO pessoasviagens   (pessoaId,
                                                    viagemId,
                                                    statusId)
                            VALUES ('$pessoa',
                                    '$viagem',
                                    1)";

            # Executa a query
            $conn->exec($query);
            
            header("location: reservar_viagens.php");
            
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