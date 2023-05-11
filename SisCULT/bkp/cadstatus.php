<?php
    require_once("topo.php");
    require_once("funcoes.php");
    if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
?>
    <h3>Cadastro de Status</h3>
    <form name="form1" 
    action="<?php echo htmlspecialchars('inserirstatus.php');?>" method="post">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" maxlength="50" required><br>
    <input type="submit" value="Cadastrar">
    <input type="reset" value="Cancelar">
    </form>
    <?php
}else{
    header("location:index.php");
}
require_once ("rodape.php");
?>