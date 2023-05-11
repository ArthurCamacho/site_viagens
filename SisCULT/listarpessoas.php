<?php
require_once("topo.php");
require_once("conexao.php");
require_once("funcoes.php");
/*  1        Administrador   
    4        Coordenador
*/
if(validarSessao() && ($_SESSION['funcao']==4 || $_SESSION['funcao']==1)){
    echo "<h3>Listagem de Pessoas</h3>";
    echo "<a href='cadpessoa.php'>Nova Pessoa</a><br>";
    $consulta = $conn->query("SELECT tbpessoas.*,tbfuncoes.descricao 
    FROM tbpessoas,tbfuncoes 
    where tbpessoas.idfuncao = tbfuncoes.id order by idStatus, nome");
    echo "<table>";
    echo "<tr><th>CPF</th><th>Nome</th><th>E-mail</th><th>Função</th><th></th></tr>";
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        if($linha['idStatus']==2) //2 - Cancelado
            echo "<tr style='color:red'>";
        else
            echo "<tr>";
        echo"<td>{$linha['cpf']}</td><td>{$linha['nome']}</td>
        <td>{$linha['email']}</td><td>{$linha['descricao']}</td>
        <td><a href='editarpessoa.php?id={$linha['id']}' 
        alt='Editar' title='Editar'>
        <span class='material-symbols-outlined'>edit_note</span></a>
        <a href='excluirpessoa.php?id={$linha['id']}' 
        alt='Desativar' title='Desativar'>
        <span class='material-symbols-outlined'>block</span></a>
        <a href='ativarpessoa.php?id={$linha['id']}' 
        alt='Ativar' title='Ativar'>
        <span class='material-symbols-outlined'>check_circle</span></a>
        </td></tr>";
    }
    echo "</table>";
}else{
    header("location:index.php");
}
require_once("rodape.php");
?>