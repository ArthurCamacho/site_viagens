<?php
require_once("topo.php");
require_once("funcoes.php");
/*  1        Administrador   */
if(validarSessao() && $_SESSION['funcao']==1){
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
                $sql="delete from tbstatus where id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $varid, PDO::PARAM_INT);
                $stmt->execute();
                // mostrar uma mensagem
                echo "<p>Excluído com sucesso.</p>";
                header("location:listarstatus.php");
            }//fim do if
            else {
                echo "<p>Selecione um registro, clique 
                <a href='listarstatus.php'>aqui</a>
                para voltar.</p>";
            }
        }//fim do if server get
        else {
            echo "<p>Problemas ao realizar o envio dos
            dados, clique 
                <a href='listarstatus.php'>aqui</a>
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