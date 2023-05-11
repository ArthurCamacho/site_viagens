<?php
require_once("topo.php");
require_once("conexao.php");
require_once("funcoes.php");
if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
?>
    <h3>Cadastro de Turmas</h3>
    <form name="form1" action="inserirturma.php"
    method="post">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" 
    placeholder="Digite a descrição"
    required maxlength="100"><br>

    <label for="curso">Curso</label>
    <select name="curso">
        <?php
        $consulta = $conn->query("SELECT * FROM tbcursos
         order by nome");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$linha['id']}'>
            {$linha['nome']}
            </option>";
        }
        ?>
    </select><br>

    <label for="local">Local</label>
    <select name="local">
        <?php
        $consulta = $conn->query("SELECT * FROM tblocais 
        order by nome");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$linha['id']}'>
            {$linha['nome']}
            </option>";
        }
        ?>
    </select><br>

    <label for="ano">Ano</label>
    <input type="number" name="ano" 
    placeholder="Digite o ano"
    required min="2023"><br>

    <label for="semestre">Semestre</label>
    <input type="number" name="semestre" 
    placeholder="Digite o semestre"
    required min="1" max="2"><br>

    <label for="datainicio">Data de Início</label>
    <input type="date" name="datainicio" 
    placeholder="Digite a Data de Início"
    required><br>

    <label for="datatermino">Data de Término</label>
    <input type="date" name="datatermino" 
    placeholder="Digite a Data de Término"
    required><br>

    <label for="professor">Professor</label>
    <select name="professor">
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

    <label for="status">Status</label>
    <select name="status">
        <?php
        
        $consulta = $conn->query("SELECT * FROM tbstatus order by descricao");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$linha['id']}'>
            {$linha['descricao']}
            </option>";
        }
        ?>
    </select><br>
    <label for="vagas">Vagas</label>
    <input type="number" name="vagas" 
    placeholder="Digite a quantidade de vagas"
    required min="1" max="100"><br>

    <input type="submit" value="Cadastrar">
    <input type="reset" value="Cancelar">
    </form>
    <?php
}else{
    header("location:index.php");
}
require_once ("rodape.php");
?>