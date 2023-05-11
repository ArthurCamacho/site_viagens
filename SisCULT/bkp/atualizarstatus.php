<?php
require_once("topo.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
    try{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //verificar se o formulário foi preenchido
            if(isset($_POST['descricao'])){
                //capturar os valores dos campos do formulário
                //e colocar nas variáveis
                $varId = testarEntrada($_POST['id']);
                $varDescricao = testarEntrada($_POST['descricao']);
                //conectar com o banco
                require_once("conexao.php");
                //inserir na tabela
                $sql="update tbstatus set descricao=:descricao where id=:id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':descricao', $varDescricao);
                $stmt->bindParam(':id', $varId);
                $stmt->execute();
                // mostrar uma mensagem
                echo "<p>Salvo com sucesso.</p>";
                header("location:listarstatus.php");
            }//fim do if
            else {
                echo "<p>Você deve preencher todos os campos
                do formulário, clique 
                <a href='cadstatus.php'>aqui</a>
                para voltar.</p>";
            }
        }//fim do if server post
        else {
            echo "<p>Problemas ao realizar o envio dos
            dados do formulário, clique 
                <a href='cadstatus.php'>aqui</a>
                para voltar.</p>";
        }
    }catch(Exception $e) {
        echo "<p class='erro'>Ocorreu um erro: " . $e->getMessage() . "</p>";
    }
}else{
    header("location:index.php");
}
require_once ("rodape.php");
?>