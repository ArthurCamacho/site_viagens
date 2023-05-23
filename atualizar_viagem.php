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
            isset($_POST['origem']) &&
            isset($_POST['destino']) &&
            isset($_POST['dataHoraPartida']) &&
            isset($_POST['dataHoraChegada']) &&
            isset($_POST['valor'])
        ){
            # Vai verificar se o email e a senha estão de acordo com o banco

            # Limpa as variáveis
            $nome = limpar($_POST['nome']);
            $origem = limpar($_POST['origem']);
            $destino = limpar($_POST['destino']);
            $dataHoraPartida = limpar($_POST['dataHoraPartida']);
            $dataHoraChegada = limpar($_POST['dataHoraChegada']);
            $valor = $_POST['valor'];
            
            # Estrutura o select que ira verificar as credencias no banco de dados
            $query = "UPDATE viagens 
                         SET nome ='$nome',
                             origemId ='$origem',
                             destinoId ='$destino',
                             dataHoraPartida ='$dataHoraPartida',
                             dataHoraChegada ='$dataHoraChegada',
                             valor ='$valor'
                       WHERE idViagem = {$_POST['id']}";
            
            $conn->exec($query);

            header("location: gerenciar_viagens.php");

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