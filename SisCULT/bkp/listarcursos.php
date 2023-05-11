<?php
require_once("topo.php");
require_once("conexao.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
    echo "<h3>Listagem de Cursos</h3>";
    echo "<a href='cadcurso.php'>Novo curso</a><br>";
    $consulta = $conn->query("SELECT tbcursos.*, tbpessoas.nome as coordenador FROM tbcursos, tbpessoas where tbcursos.idCoordenador = tbpessoas.id order by nome");
    echo "<table>";
    echo "<tr><th>Id</th><th>Nome</th><th>Nível</th><th>Coordenador</th><th></th></tr>";
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        if($linha['status']==2)
            echo "<tr style='color:red'>";
        else
            echo "<tr>";
        echo"<td>{$linha['id']}</td><td>{$linha['nome']}</td>
        <td>{$linha['nivel']}</td><td>{$linha['coordenador']}</td>
        <td><a href='editarcurso.php?id={$linha['id']}' 
        alt='Editar' title='Editar'>
        <span class='material-symbols-outlined'>edit_note</span></a>
        <a href='excluircurso.php?id={$linha['id']}' 
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