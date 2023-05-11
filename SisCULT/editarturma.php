<?php
require_once("topo.php");
require_once("conexao.php");
require_once("funcoes.php");
/*
1        Administrador   
3        Professor
4        Coordenador
*/
if(validarSessao() && ($_SESSION['funcao']==1 || $_SESSION['funcao']==3 || $_SESSION['funcao']==4)){
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
    <h3>Cadastro de Turmas</h3>
    <form name="form1" action="<?php echo htmlspecialchars('atualizarturma.php');?>"
    method="post">
    <input type="hidden" name="id" 
        value="<?php echo $linha['id']; ?>"><br>
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" 
    placeholder="Digite a descrição"
    value="<?php echo "{$linha['descricao']}"; ?>"
    required maxlength="100"><br>

    <label for="curso">Curso</label>
    <select name="curso">
        <?php
        $consulta1 = $conn->query("SELECT * FROM tbcursos
         order by nome");
        while ($linha1 = $consulta1->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$linha1['id']}'>
            {$linha1['nome']}
            </option>";
        }
        ?>
    </select><br>

    <label for="local">Local</label>
    <select name="local">
        <?php
        $consulta2 = $conn->query("SELECT * FROM tblocais 
        order by nome");
        while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$linha2['id']}'>
            {$linha2['nome']}
            </option>";
        }
        ?>
    </select><br>

    <label for="ano">Ano</label>
    <input type="number" name="ano" 
    placeholder="Digite o ano"
    value="<?php echo "{$linha['ano']}"; ?>"
    required min="2023"><br>

    <label for="semestre">Semestre</label>
    <input type="number" name="semestre" 
    placeholder="Digite o semestre"
    value="<?php echo "{$linha['semestre']}"; ?>"
    required min="1" max="2"><br>

    <label for="datainicio">Data de Início</label>
    <input type="date" name="datainicio" 
    placeholder="Digite a Data de Início"
    value="<?php echo "{$linha['datainicio']}"; ?>"
    required><br>

    <label for="datatermino">Data de Término</label>
    <input type="date" name="datatermino" 
    placeholder="Digite a Data de Término"
    value="<?php echo "{$linha['datatermino']}"; ?>"
    required><br>

    <label for="professor">Professor</label>
    <select name="professor">
        <?php
        $consulta3 = $conn->query("SELECT * FROM tbpessoas order by nome");
        while ($linha3 = $consulta3->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$linha3['id']}'>
            {$linha3['nome']}
            </option>";
        }
        ?>
    </select><br>

    <label for="status">Status</label>
    <select name="status">
        <?php
        
        $consulta4 = $conn->query("SELECT * FROM tbstatus order by descricao");
        while ($linha4 = $consulta4->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$linha4['id']}'>
            {$linha4['descricao']}
            </option>";
        }
        ?>
    </select><br>
    <label for="vagas">Vagas</label>
    <input type="number" name="vagas" 
    placeholder="Digite a quantidade de vagas"
    required min="1" max="100"><br>

    <label for="datainicioinscricoes">Data de Início das Inscrições</label>
    <input type="date" name="datainicioinscricoes" 
    placeholder="Digite a Data de Início das Inscrições"
    value="<?php echo "{$linha['datainicioinscricoes']}"; ?>"
    required><br>

    <label for="datafiminscricoes">Data de Término das Inscrições</label>
    <input type="date" name="datafiminscricoes" 
    placeholder="Digite a Data de Término das Inscrições"
    value="<?php echo "{$linha['datafiminscricoes']}"; ?>"
    required><br>

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