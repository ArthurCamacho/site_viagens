<?php
require_once("topo.php");
    try{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //verificar se o formulário foi preenchido
        if(isset($_POST['nome']) &&
        isset($_POST['email']) &&
        isset($_POST['endereco']) &&
        isset($_POST['senha']) &&
        isset($_POST['cpf']) &&
        isset($_POST['telefone'])){
            //capturar os valores dos campos do formulário
            //e colocar nas variáveis
            $varNome = $_POST['nome'];
            $varEmail = $_POST['email'];
            $varEndereco = $_POST['endereco'];
            $varSenha = $_POST['senha'];
            $varCpf = $_POST['cpf'];
            $varTelefone = $_POST['telefone'];
            //conectar com o banco
            require_once("conexao.php");
            //inserir na tabela
            $sql="insert into tbpessoas 
            (nome,email,senha,telefone,cpf,endereco,idFuncao)
            values 
            ('$varNome','$varEmail','$varSenha',
            '$varTelefone','$varCpf','$varEndereco',5)";
            $conn->exec($sql);
            // mostrar uma mensagem
            echo "<p>Salvo com sucesso.</p>";
            header("location:login.php");
        }//fim do if
        else {
            echo "<p>Você deve preencher todos os campos
            do formulário, clique 
            <a href='cadastrese.php'>aqui</a>
            para voltar.</p>";
        }
        }//fim do if server post
        else {
            echo "<p>Problemas ao realizar o envio dos
            dados do formulário, clique 
                <a href='cadastrese.php'>aqui</a>
                para voltar.</p>";
        }
    }catch(Exception $e) {
        echo "<p class='erro'>Ocorreu um erro: " . $e->getMessage() . "</p>";
    }
require_once ("rodape.php");
?>