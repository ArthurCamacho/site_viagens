<?php
require_once("topo.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
    try{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //verificar se o formulário foi preenchido
        if(isset($_POST['id']) &&
        isset($_POST['nome']) &&
        isset($_POST['endereco']) &&
        isset($_POST['telefone']) &&
        isset($_POST['responsavel'])){
            //capturar os valores dos campos do formulário
            //e colocar nas variáveis
            $varId = testarEntrada($_POST['id']);
            $varNome = testarEntrada($_POST['nome']);
            $varEndereco = testarEntrada($_POST['endereco']);
            $varTelefone = testarEntrada($_POST['telefone']);
            $varResponsavel = testarEntrada($_POST['responsavel']);
            $varCoordenador = testarEntrada($_POST['coordenador']);
            //conectar com o banco
            require_once("conexao.php");
            //inserir na tabela
            $sql="update tblocais 
            set nome=?,endereco=?,telefone=?,responsavel=?,idCoordenador=? where id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $varNome);
            $stmt->bindParam(2, $varEndereco);
            $stmt->bindParam(3, $varTelefone);
            $stmt->bindParam(4, $varResponsavel);
            $stmt->bindParam(5, $varCoordenador);
            $stmt->bindParam(6, $varId, PDO::PARAM_INT);
            $stmt->execute();
            // mostrar uma mensagem
            echo "<p>Salvo com sucesso.</p>";
            header("location:listarlocais.php");
        }//fim do if
        else {
            echo "<p>Você deve preencher todos os campos
            do formulário, clique 
            <a href='cadlocal.php'>aqui</a>
            para voltar.</p>";
        }
        }//fim do if server post
        else {
            echo "<p>Problemas ao realizar o envio dos
            dados do formulário, clique 
                <a href='cadlocal.php'>aqui</a>
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