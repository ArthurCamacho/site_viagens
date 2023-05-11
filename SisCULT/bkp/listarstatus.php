<?php
require_once("topo.php");
require_once("conexao.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
    echo "<h3>Listagem de Status</h3>";
    echo "<a href='cadstatus.php'>Novo Status</a><br>";
    $consulta = $conn->query("SELECT * FROM tbstatus");
    echo "<table>";
    echo "<tr><th>Id</th><th>Descrição</th><th></th></tr>";
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>{$linha['id']}</td>
        <td>{$linha['descricao']}</td><td>";
        if($linha['id']<>1 && $linha['id']<>2) {
        echo "<a href='editarstatus.php?id={$linha['id']}' 
        alt='Editar' title='Editar'>
        <span class='material-symbols-outlined'>edit_note</span></a>
        <a href='excluirstatus.php?id={$linha['id']}' 
        alt='Excluir' title='Excluir'>
        <span class='material-symbols-outlined'>delete</span></a>";
        }
        echo "</td></tr>";
    }
    echo "</table>";
}else{
    header("location:index.php");
}
require_once("rodape.php");
?>