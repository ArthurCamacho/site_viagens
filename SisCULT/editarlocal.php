<?php
require_once("topo.php");
require_once("funcoes.php");
/*  1        Administrador   */
if(validarSessao() && $_SESSION['funcao']==1){
    try{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        //verificar se o formulário foi preenchido
        if(isset($_GET['id'])){
            //capturar os valores dos campos do formulário
            //e colocar nas variáveis
            $varid = testarEntrada($_GET['id']);
            //conectar com o banco
            require_once("conexao.php");
            $sql = "SELECT * from tblocais where id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $varid, PDO::PARAM_INT);
            $stmt->execute();
            //while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($stmt->rowCount() == 1){
                $linha = $stmt->fetch(PDO::FETCH_ASSOC);
?>
                <h3>Edição de Local</h3>
                <form name="form1" action="atualizarlocal.php" method="post">
                <input type="hidden" name="id" 
                    value="<?php echo $linha['id']; ?>"><br>
                
                <label for="nome">Nome</label>
                <input type="text" name="nome" 
                placeholder="Digite o nome" value="<?php echo "{$linha['nome']}"; ?>"
                required maxlength="200"><br>

                <label for="endereco">Endereço</label>
                <textarea name="endereco" cols="20" rows="10"
                placeholder="Digite seu endereço" required>
                <?php echo "{$linha['endereco']}"; ?>
                </textarea><br>

                <label for="telefone">Telefone</label>
                <input type="tel" name="telefone" value="<?php echo "{$linha['telefone']}"; ?>"
                placeholder="Digite seu telefone"
                required><br>

                <label for="responsavel">Responsável</label>
                <input type="text" name="responsavel" 
                placeholder="Digite o responsável" value='<?php echo "{$linha['responsavel']}"; ?>'
                required maxlength="100"><br>

                <label for="coordenador">Coordenador</label>
                <select name="coordenador">
                    <?php
                    require_once("conexao.php");
                    $consulta2 = $conn->query("SELECT * FROM tbpessoas order by nome");
                    while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                        
                        echo "<option value='{$linha2['id']}'";
                        if($linha['id']==$linha2['id'])
                        echo " selected";
                        echo "> {$linha2['nome']}</option>";
                    }
                    ?>
                </select><br>

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