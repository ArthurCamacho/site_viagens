<?php
require_once("topo.php");
require_once("funcoes.php");
if(validarSessao()){
    try{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //verificar se o formulário foi preenchido
        if(isset($_POST['nome']) &&
        isset($_POST['email']) &&
        isset($_POST['cpf']) &&
        isset($_POST['telefone'])){
            //capturar os valores dos campos do formulário
            //e colocar nas variáveis
            $varNome = $_POST['nome'];
            $varEmail = $_POST['email'];
            $varCpf = $_POST['cpf'];
            $varTelefone = $_POST['telefone'];
            //conectar com o banco
            require_once("conexao.php");
            //inserir na tabela
            $sql="CALL inserirDependente5({$_SESSION['idUsuario']},'$varNome','$varEmail','$varCpf','$varTelefone');";
            $conn->exec($sql);
            // mostrar uma mensagem
            echo "<p>Salvo com sucesso.</p>";
            header("location:listarpessoas.php");
        }//fim do if
        else {
            echo "<p>Você deve preencher todos os campos
            do formulário, clique 
            <a href='caddependente.php'>aqui</a>
            para voltar.</p>";
        }
        }//fim do if server post
        else {
            echo "<p>Problemas ao realizar o envio dos
            dados do formulário, clique 
                <a href='caddependente.php'>aqui</a>
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