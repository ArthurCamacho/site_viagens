<?php
require_once("topo.php");
require_once("conexao.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
    echo "<h3>Listagem de Dependentes</h3>";
    $consulta = $conn->query("SELECT tbdependentes.*, 
    Responsavel.id as idResponsavel, Responsavel.nome as responsavel, 
    Dependentes.id as idDependente, Dependentes.nome as dependente,
    Dependentes.cpf, Dependentes.email  
    FROM tbdependentes, tbpessoas as Responsavel, tbpessoas as Dependentes 
    where tbdependentes.idPessoaResponsavel = Responsavel.id 
    AND tbdependentes.idPessoaDependente = Dependentes.id
    order by Dependentes.idStatus, Dependentes.nome");
    //and tbdependentes.idPessoaResponsavel = {$_SESSION['idUsuario']}  
    echo "<table>";
    echo "<tr><th>CPF</th><th>Nome</th><th>E-mail</th><th>Responsável</th><th></th></tr>";
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo"<td>{$linha['cpf']}</td><td>{$linha['dependente']}</td>
        <td>{$linha['email']}</td><td>{$linha['responsavel']}</td>
        <td><a href='vercursosdependente.php?idr={$linha['idPessoaResponsavel']}&idd={$linha['idPessoaDependente']}' 
        alt='Ver cursos' title='Ver cursos'>
        <span class='material-symbols-outlined'>manage_search</span></a>
        <a href='excluirdependente.php?idr={$linha['idPessoaResponsavel']}&idd={$linha['idPessoaDependente']}' 
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