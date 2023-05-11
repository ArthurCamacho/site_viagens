<?php
require_once("topo.php");
require_once("funcoes.php");
if(validarSessao()){
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
            $sql="update tbpessoas 
            set nome=?,email=?,senha=?,telefone=?,cpf=?,endereco=? where id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $varNome);
            $stmt->bindParam(2, $varEmail);
            $stmt->bindParam(3, $varSenha);
            $stmt->bindParam(4, $varTelefone);
            $stmt->bindParam(5, $varCpf);
            $stmt->bindParam(6, $varEndereco);
            $stmt->bindParam(7, $_SESSION['idUsuario'], PDO::PARAM_INT);
            $stmt->execute();
             // mostrar uma mensagem
            echo "<p>Salvo com sucesso.</p>";
            header("location:index.php");
        }//fim do if
        else {
            echo "<p>Você deve preencher todos os campos
            do formulário, clique 
            <a href='editarperfil.php'>aqui</a>
            para voltar.</p>";
        }
        }//fim do if server post
        else {
            echo "<p>Problemas ao realizar o envio dos
            dados do formulário, clique 
                <a href='editarperfil.php'>aqui</a>
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