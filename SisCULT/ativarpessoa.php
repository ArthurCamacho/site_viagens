<?php
require_once("topo.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
    try{
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            //verificar se o formulário foi preenchido
            if(isset($_GET['id'])){
                //capturar os valores dos campos do formulário
                //e colocar nas variáveis
                $varid = testarEntrada($_GET['id']);
                //conectar com o banco
                require_once("conexao.php");
                //inserir na tabela
                $sql="update tbpessoas set idStatus = 1 where id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $varid, PDO::PARAM_INT);
                $stmt->execute();
                // mostrar uma mensagem
                echo "<p>Ativado com sucesso.</p>";
                header("location:listarpessoas.php");
            }//fim do if
            else {
                echo "<p>Você deve preencher todos os campos
                do formulário, clique 
                <a href='listarcursos.php'>aqui</a>
                para voltar.</p>";
            }
        }//fim do if server get
        else {
            echo "<p>Problemas ao realizar o envio dos
            dados, clique 
                <a href='listarcursos.php'>aqui</a>
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