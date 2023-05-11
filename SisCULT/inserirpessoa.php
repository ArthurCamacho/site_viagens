<?php
require_once("topo.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
    try{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //verificar se o formulário foi preenchido
        if(isset($_POST['nome']) &&
        isset($_POST['email']) &&
        isset($_POST['endereco']) &&
        isset($_POST['senha']) &&
        isset($_POST['cpf']) &&
        isset($_POST['telefone'])&&
        isset($_POST['funcao'])){
            //capturar os valores dos campos do formulário
            //e colocar nas variáveis
            $varNome = $_POST['nome'];
            $varEmail = $_POST['email'];
            $varEndereco = $_POST['endereco'];
            $varSenha = $_POST['senha'];
            $varCpf = $_POST['cpf'];
            $varTelefone = $_POST['telefone'];
            $varFuncao = $_POST['funcao'];
            //conectar com o banco
            require_once("conexao.php");
            //inserir na tabela
            $sql="insert into tbpessoas 
            (nome,email,senha,telefone,cpf,endereco,idfuncao)
            values 
            ('$varNome','$varEmail','$varSenha',
            '$varTelefone','$varCpf','$varEndereco',$varFuncao)";
            $conn->exec($sql);
            // mostrar uma mensagem
            echo "<p>Salvo com sucesso.</p>";
            header("location:listarpessoas.php");
        }//fim do if
        else {
            echo "<p>Você deve preencher todos os campos
            do formulário, clique 
            <a href='cadpessoa.php'>aqui</a>
            para voltar.</p>";
        }
        }//fim do if server post
        else {
            echo "<p>Problemas ao realizar o envio dos
            dados do formulário, clique 
                <a href='cadpessoa.php'>aqui</a>
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