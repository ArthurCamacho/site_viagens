<?php
require "php/conexao.php";
session_start();
if(isset($_SESSION["idPessoa"]) && (
    $_SESSION["funcaoId"] == 1 ||
    $_SESSION["funcaoId"] == 3
)){
    try{
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $sql = "SELECT *
                          FROM pessoas
                         WHERE idPessoa = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                if($stmt->rowCount() == 1){
                    $linha = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <h3>Edição de Pessoas</h3>
                    <form name="form1" action="atualizar_pessoa.php" method="post">
                        <input type="hidden" name="id" 
                        value="<?php echo $linha['idPessoa']; ?>"><br>

                        <label for="nome">Nome</label><br>
                        <input type="text" name="nome" maxlength="80" required value="<?php echo $linha['nome']; ?>"><br>

                        <label for="cpf">CPF</label><br>
                        <input type="text" name="cpf" maxlength="11" required value="<?php echo $linha['cpf']; ?>"><br>

                        <label for="cep">CEP</label><br>
                        <input type="text" name="cep" maxlength="8" required value="<?php echo $linha['cep']; ?>"><br>
                        
                        <label for="rua">Rua</label><br>
                        <input type="text" name="rua" maxlength="50" required value="<?php echo $linha['rua']; ?>"><br>

                        <label for="numeroPredio">Número do prédio</label><br>
                        <input type="number" name="numeroPredio" maxlength="11" required value="<?php echo $linha['numeroPredio']; ?>"><br>

                        <label for="bairro">Bairro</label><br>
                        <input type="text" name="bairro" maxlength="50" required value="<?php echo $linha['bairro']; ?>"><br>

                        <label for="cidade">Cidade</label><br>
                        <input type="text" name="cidade" maxlength="50" required value="<?php echo $linha['cidade']; ?>"><br>

                        <label for="estado">Estado (UF)</label><br>
                        <input type="text" name="estado" maxlength="2" required value="<?php echo $linha['estado']; ?>"><br>

                        <label for="telefone">Telefone</label><br>
                        <input type="text" name="telefone" maxlength="20" required value="<?php echo $linha['telefone']; ?>"><br>

                        <label for="senha">Senha</label><br>
                        <input type="text" name="senha" maxlength="50" required value="<?php echo $linha['senha']; ?>"><br>

                        <input type="submit" value="Cadastrar">
                        <input type="reset" value="Cancelar">
                    </form>

                <?php
                }
            }
        }
    }
    catch(Exception $e){

    }
}
?>