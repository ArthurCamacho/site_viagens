<?php
require_once("topo.php");
require_once("conexao.php");
require_once("funcoes.php");
/*
1        Administrador   
3        Professor
4        Coordenador
*/
if(validarSessao() && ($_SESSION['funcao']==1 || $_SESSION['funcao']==3 || $_SESSION['funcao']==4)){
    echo "<h3>Listagem de Cursos</h3>";
    if($_SESSION['funcao']==1 || $_SESSION['funcao']==4)
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
        <td>{$linha['nivel']}</td><td>{$linha['coordenador']}</td>";
        if($_SESSION['funcao']==1 || $_SESSION['idUsuario']==$linha['idCoordenador'])
            echo "<td><a href='editarcurso.php?id={$linha['id']}' 
            alt='Editar' title='Editar'>
            <span class='material-symbols-outlined'>edit_note</span></a>
            <a href='excluircurso.php?id={$linha['id']}' 
            alt='Excluir' title='Excluir'>
            <span class='material-symbols-outlined'>delete</span></a>
            </td></tr>";
        else 
            echo "<td></td></tr>";
    }
    echo "</table>";
}else{
    header("location:index.php");
}
require_once("rodape.php");
?>