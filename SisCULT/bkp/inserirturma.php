<?php
require_once("topo.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
    try{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //verificar se o formulário foi preenchido
        if(isset($_POST['descricao']) &&
        isset($_POST['curso']) &&
        isset($_POST['local']) &&
        isset($_POST['ano']) &&
        isset($_POST['semestre']) &&
        isset($_POST['datainicio']) &&
        isset($_POST['datatermino']) &&
        isset($_POST['professor']) &&
        isset($_POST['status'])&&
        isset($_POST['vagas'])){
            //capturar os valores dos campos do formulário
            //e colocar nas variáveis
            $vardescricao = $_POST['descricao'];
            $varcurso = $_POST['curso'];
            $varlocal = $_POST['local'];
            $varano = $_POST['ano'];
            $varsemestre = $_POST['semestre'];
            $vardatainicio = $_POST['datainicio'];
            $vardatatermino = $_POST['datatermino'];
            $varprofessor = $_POST['professor'];
            $varstatus = $_POST['status'];
            $varvagas = $_POST['vagas'];
            //conectar com o banco
            require_once("conexao.php");
            //inserir na tabela
            $sql="insert into tbturmas 
            (descricao,idcurso,idlocal,
            ano,semestre,datainicio,
            datatermino,idprofessor,status,vagas)
            values 
            ('$vardescricao',$varcurso,$varlocal,
            $varano,$varsemestre,'$vardatainicio',
            '$vardatatermino',$varprofessor,$varstatus,$varvagas)";
            $conn->exec($sql);
            // mostrar uma mensagem
            echo "<p>Salvo com sucesso.</p>";
            header("location:listarturmas.php");
        }//fim do if
        else {
            echo "<p>Você deve preencher todos os campos
            do formulário, clique 
            <a href='cadturma.php'>aqui</a>
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