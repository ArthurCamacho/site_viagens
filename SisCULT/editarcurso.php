<?php
require_once("topo.php");
require_once("funcoes.php");
if(validarSessao()){
    try{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        //verificar se o formulário foi preenchido
        if(isset($_GET['id'])){
            //capturar os valores dos campos do formulário
            //e colocar nas variáveis
            $varid = testarEntrada($_GET['id']);
            //conectar com o banco
            require_once("conexao.php");
            $sql = "SELECT * from tbcursos where id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $varid, PDO::PARAM_INT);
            $stmt->execute();
            //while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($stmt->rowCount() == 1){
                $linha = $stmt->fetch(PDO::FETCH_ASSOC);
?>
                <h3>Edição de Cursos</h3>
                <form name="form1" action="atualizarcurso.php" method="post">
                <input type="hidden" name="id" 
                    value="<?php echo $linha['id']; ?>"><br>

                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Digite o nome"
                required maxlength="100" value="<?php echo "{$linha['nome']}"; ?>"><br>

                <label for="nivel">Nível</label>
                <input type="number" name="nivel" placeholder="Digite o nível"
                required min="1" value=<?php echo "{$linha['nivel']}"; ?>><br>

                <label for="faixaetariaminima">Faixa etária mínima</label>
                <input type="number" name="faixaetariaminima" placeholder="Digite a faixa etária"
                required min="1" value="<?php echo "{$linha['faixaetariaminima']}"; ?>"><br>

                <label for="faixaetariamaxima">Faixa etária máxima</label>
                <input type="number" name="faixaetariamaxima" 
                placeholder="Digite a faixa etária"
                required min="1" value="<?php echo "{$linha['faixaetariamaxima']}"; ?>"><br>

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
            }//FIM DO IF ACHOU O REGISTRO
            else {
                echo "<p>Registro não encontrado, clique 
                <a href='listarcursos.php'>aqui</a>
                para voltar.</p>";
            }
        }//fim do if
        else {
            echo "<p>Você deve selecionar um registro, clique 
            <a href='listarcursos.php'>aqui</a>
            para voltar.</p>";
        }
    }//fim do if server get
    else {
        echo "<p>Problemas ao realizar o envio dos
        dados, clique 
            <a href='listarcursos.php'>aqui</a>
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