<?php
    require_once("topo.php");
    require_once("funcoes.php");
    if(validarSessao() && $_SESSION['funcao']<>5 || $_SESSION['funcao']==1){
        try{
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            //verificar se o formulário foi preenchido
            if(isset($_GET['id'])){
                //capturar os valores dos campos do formulário
                //e colocar nas variáveis
                $varid = testarEntrada($_GET['id']);
                //conectar com o banco
                require_once("conexao.php");
                $sql = "SELECT * from tbstatus where id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $varid, PDO::PARAM_INT);
                $stmt->execute();
                if($stmt->rowCount() == 1){
                    $linha = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <h3>Edição de Status</h3>
    <form name="form1" 
    action="<?php echo htmlspecialchars('atualizarstatus.php');?>" method="post">
    <input type="hidden" name="id" 
        value="<?php echo $linha['id']; ?>"><br>
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" maxlength="50" value="<?php echo "{$linha['descricao']}"; ?>" required><br>
    <input type="submit" value="Cadastrar">
    <input type="reset" value="Cancelar">
    </form>
    <?php
}//FIM DO IF ACHOU O REGISTRO
else {
    echo "<p>Registro não encontrado, clique 
    <a href='listarlocais.php'>aqui</a>
    para voltar.</p>";
}
}//fim do if
else {
echo "<p>Você deve selecionar um registro, clique 
<a href='listarlocais.php'>aqui</a>
para voltar.</p>";
}
}//fim do if server get
else {
echo "<p>Problemas ao realizar o envio dos
dados, clique 
<a href='listarlocais.php'>aqui</a>
para voltar.</p>";
}
}catch(Exception $e) {
echo "<p class='erro'>Ocorreu um erro: " . $e->getMessage() . "</p>";
}
}else{
header("location:index.php");
}
require_once ("rodape.php");
?>