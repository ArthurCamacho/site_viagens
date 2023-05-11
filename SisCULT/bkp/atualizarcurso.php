<?php
require_once("topo.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
    try{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //verificar se o formulário foi preenchido
        if(isset($_POST['id']) &&
        isset($_POST['nome']) &&
        isset($_POST['nivel']) &&
        isset($_POST['faixaetariaminima']) &&
        isset($_POST['faixaetariamaxima']) &&
        isset($_POST['status'])&&
        isset($_POST['coordenador'])){
            //capturar os valores dos campos do formulário
            //e colocar nas variáveis
            $varNome = testarEntrada($_POST['nome']);
            $varNivel = testarEntrada($_POST['nivel']);
            $varFaixaetariaminima = testarEntrada($_POST['faixaetariaminima']);
            $varFaixaetariamaxima = testarEntrada($_POST['faixaetariamaxima']);
            $varStatus = testarEntrada($_POST['status']);
            $varCoordenador = testarEntrada($_POST['coordenador']);
            $varId = testarEntrada($_POST['id']);
            //conectar com o banco
            require_once("conexao.php");
            //atualizar na tabela
            $sql="update tbcursos 
            set nome=:nome,nivel=:nivel,faixaetariaminima=:faixaetariaminima,
            faixaetariamaxima=:faixaetariamaxima,status=:status,idCoordenador=:coordenador
            where id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome', $varNome);
            $stmt->bindParam(':nivel', $varNivel);
            $stmt->bindParam(':faixaetariaminima', $varFaixaetariaminima);
            $stmt->bindParam(':faixaetariamaxima', $varFaixaetariamaxima);
            $stmt->bindParam(':status', $varStatus);
            $stmt->bindParam(':coordenador', $varCoordenador);
            $stmt->bindParam(':id', $varId);
            $stmt->execute();
            // mostrar uma mensagem
            echo "<p>Salvo com sucesso.</p>";
            header("location:listarcursos.php");
        }//fim do if
        else {
            echo "<p>Você deve preencher todos os campos
            do formulário, clique 
            <a href='cadcurso.php'>aqui</a>
            para voltar.</p>";
        }
        }//fim do if server post
        else {
            echo "<p>Problemas ao realizar o envio dos
            dados do formulário, clique 
                <a href='cadcurso.php'>aqui</a>
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