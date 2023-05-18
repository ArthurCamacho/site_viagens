<?php

session_start();
require "conexao.php";
require "topo.php";
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
                        <input type="hidden" name="id" value="<?php echo $linha['idPessoa']; ?>"><br>

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
                        <select type="text" name="estado" maxlength="2" required>
                            <option value="" >Selecione...</option>
                            <option value="AC" <?php if($linha['estado'] == 'AC') echo "selected='selected'";?>>AC</option>
                            <option value="AL" <?php if($linha['estado'] == 'AL') echo "selected='selected'";?>>AL</option>
                            <option value="AP" <?php if($linha['estado'] == 'AP') echo "selected='selected'";?>>AP</option>
                            <option value="AM" <?php if($linha['estado'] == 'AM') echo "selected='selected'";?>>AM</option>
                            <option value="BA" <?php if($linha['estado'] == 'BA') echo "selected='selected'";?>>BA</option>
                            <option value="CE" <?php if($linha['estado'] == 'CE') echo "selected='selected'";?>>CE</option>
                            <option value="DF" <?php if($linha['estado'] == 'DF') echo "selected='selected'";?>>DF</option>
                            <option value="ES" <?php if($linha['estado'] == 'ES') echo "selected='selected'";?>>ES</option>
                            <option value="GO" <?php if($linha['estado'] == 'GO') echo "selected='selected'";?>>GO</option>
                            <option value="MA" <?php if($linha['estado'] == 'MA') echo "selected='selected'";?>>MA</option>
                            <option value="MT" <?php if($linha['estado'] == 'MT') echo "selected='selected'";?>>MT</option>
                            <option value="MS" <?php if($linha['estado'] == 'MS') echo "selected='selected'";?>>MS</option>
                            <option value="MG" <?php if($linha['estado'] == 'MG') echo "selected='selected'";?>>MG</option>
                            <option value="PA" <?php if($linha['estado'] == 'PA') echo "selected='selected'";?>>PA</option>
                            <option value="PB" <?php if($linha['estado'] == 'PB') echo "selected='selected'";?>>PB</option>
                            <option value="PR" <?php if($linha['estado'] == 'PR') echo "selected='selected'";?>>PR</option>
                            <option value="PE" <?php if($linha['estado'] == 'PE') echo "selected='selected'";?>>PE</option>
                            <option value="PI" <?php if($linha['estado'] == 'PI') echo "selected='selected'";?>>PI</option>
                            <option value="RJ" <?php if($linha['estado'] == 'RJ') echo "selected='selected'";?>>RJ</option>
                            <option value="RN" <?php if($linha['estado'] == 'RN') echo "selected='selected'";?>>RN</option>
                            <option value="RS" <?php if($linha['estado'] == 'RS') echo "selected='selected'";?>>RS</option>
                            <option value="RO" <?php if($linha['estado'] == 'RO') echo "selected='selected'";?>>RO</option>
                            <option value="RR" <?php if($linha['estado'] == 'RR') echo "selected='selected'";?>>RR</option>
                            <option value="SC" <?php if($linha['estado'] == 'SC') echo "selected='selected'";?>>SC</option>
                            <option value="SP" <?php if($linha['estado'] == 'SP') echo "selected='selected'";?>>SP</option>
                            <option value="SE" <?php if($linha['estado'] == 'SE') echo "selected='selected'";?>>SE</option>
                            <option value="TO" <?php if($linha['estado'] == 'TO') echo "selected='selected'";?>>TO</option>
                        </select><br>


                        <label for="telefone">Telefone</label><br>
                        <input type="text" name="telefone" maxlength="20" required value="<?php echo $linha['telefone']; ?>"><br>

                        <label for="senha">Senha</label><br>
                        <input type="text" name="senha" maxlength="50" required value="<?php echo $linha['senha']; ?>"><br>
                        
                        <label for='funcao'>Função</label><br>
                        <select name='funcao' >
                            <?php
                                $consultaFuncao = $conn->query("SELECT *
                                                            FROM funcoes
                                                        ORDER BY idFuncao");
                                while($linhaFuncao = $consultaFuncao->fetch(PDO::FETCH_ASSOC)){
                                    if($linha['funcaoId'] == $linhaFuncao['idFuncao']){
                                        echo "<option value='{$linhaFuncao['idFuncao']}' selected='selected'>{$linhaFuncao['funcao']}</option>";
                                    }
                                    else{
                                        echo "<option value='{$linhaFuncao['idFuncao']}'>{$linhaFuncao['funcao']}</option>";
                                    }
                                }
                            ?>
                        </select><br>

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