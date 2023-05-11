<?php
    require_once("topo.php");
    require_once("funcoes.php");
    if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
?>
    <h3>Cadastro de Locais</h3>
    <form name="form1" action="inserirlocal.php"
    method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" 
    placeholder="Digite o nome"
    required maxlength="200"><br>

    <label for="endereco">Endereço</label>
    <textarea name="endereco" cols="20" rows="10"
    placeholder="Digite seu endereço"
    required></textarea><br>

    <label for="telefone">Telefone</label>
    <input type="tel" name="telefone" 
    placeholder="Digite seu telefone"
    required><br>

    <label for="responsavel">Responsável</label>
    <input type="text" name="responsavel" 
    placeholder="Digite o responsável"
    required maxlength="100"><br>

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