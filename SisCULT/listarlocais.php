<?php
require_once("topo.php");
require_once("conexao.php");
require_once("funcoes.php");
/*  1        Administrador   */
if(validarSessao() && $_SESSION['funcao']==1){
    echo "<h3>Listagem de Locais</h3>";
    echo "<a href='cadlocal.php'>Novo Local</a><br>";
    $consulta = $conn->query("SELECT * FROM tblocais order by nome");
    echo "<table>";
    echo "<tr><th>Nome</th><th>Telefone</th><th>Responsável</th><th></th></tr>";
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>{$linha['nome']}</td>
        <td>{$linha['telefone']}</td>
        <td>{$linha['responsavel']}</td>
        <td><a href='editarlocal.php?id={$linha['id']}' 
        alt='Editar' title='Editar'>
        <span class='material-symbols-outlined'>edit_note</span></a>
        <a href='excluirlocal.php?id={$linha['id']}' 
        alt='Excluir' title='Excluir'>
        <span class='material-symbols-outlined'>delete</span></a>
        </td></tr>";
    }
    echo "</table>";
}else{
    header("location:index.php");
}
require_once("rodape.php");
?>