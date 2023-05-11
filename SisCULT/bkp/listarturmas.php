<?php
require_once("topo.php");
require_once("conexao.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
    //3 - professor

    echo "<h3>Listagem de Turmas</h3>";
    echo "<a href='cadturma.php'>Nova Turma</a><br>";
    $consulta = $conn->query("SELECT tbturmas.*, 
    tbcursos.nome as curso, tblocais.nome as local
    FROM tbturmas, tbcursos, tblocais where tbturmas.idCurso =
    tbcursos.id AND tbturmas.idLocal = tblocais.id order by tbturmas.status, descricao;");
    echo "<table>";
    echo "<tr><th>Id</th><th>Descrição</th>
    <th>Curso</th><th>Local</th>
    <th>Ano</th><th></th></tr>";
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        if($linha['idprofessor']==$_SESSION['idUsuario'] || $_SESSION['funcao']==1){
            if($linha['status']==2)
            echo "<tr style='color:red'>";
            else
                echo "<tr>";
            echo "<td>{$linha['id']}</td>
            <td>{$linha['descricao']}</td>
            <td>{$linha['curso']}</td>
            <td>{$linha['local']}</td>
            <td>{$linha['ano']}</td>";
            if($_SESSION['funcao']==4 || $_SESSION['funcao']==1){
                echo "<td><a href='editarturma.php?id={$linha['id']}' 
                alt='Editar' title='Editar'>
                <span class='material-symbols-outlined'>edit_note</span></a>
                <a href='excluirturma.php?id={$linha['id']}' 
                alt='Excluir' title='Excluir'>
                <span class='material-symbols-outlined'>delete</span></a>
                </td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";
}else{
    header("location:index.php");
}    
require_once("rodape.php");
?>