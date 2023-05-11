<?php
require_once("topo.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
?>
    <h3>Cadastro de Cursos</h3>
    <form name="form1" action="inserircurso.php" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" placeholder="Digite o nome"
    required maxlength="100"><br>

    <label for="nivel">Nível</label>
    <input type="number" name="nivel" placeholder="Digite o nível"
    required min="1"><br>

    <label for="faixaetariaminima">Faixa etária mínima</label>
    <input type="number" name="faixaetariaminima" placeholder="Digite a faixa etária"
    required min="1"><br>

    <label for="faixaetariamaxima">Faixa etária máxima</label>
    <input type="number" name="faixaetariamaxima" 
    placeholder="Digite a faixa etária"
    required min="1"><br>

    <label for="status">Status</label>
    <select name="status">
        <?php
        require_once("conexao.php");
        $consulta = $conn->query("SELECT * FROM tbstatus order by descricao");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$linha['id']}'>
            {$linha['descricao']}
            </option>";
        }
        ?>
    </select><br>

    <label for="coordenador">Coordenador</label>
    <select name="coordenador">
        <?php
        require_once("conexao.php");
        $consulta = $conn->query("SELECT * FROM tbpessoas order by nome");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$linha['id']}'>
            {$linha['nome']}
            </option>";
        }
        ?>
    </select><br>

    <input type="submit" value="Cadastrar">
    <input type="reset" value="Cancelar">
    </form>
    <?php
}else{
    header("location:index.php");
}
require_once ("rodape.php");
?>