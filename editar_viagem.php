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
                          FROM viagens
                         WHERE idViagem = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                if($stmt->rowCount() == 1){
                    $linha = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <h3>Edição de Viagens</h3>
                    <form name="form1" action="atualizar_viagem.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $linha['idViagem']; ?>"><br>

                        <label for="nome">Nome</label><br>
                        <input type="text" name="nome" maxlength="50" value="<?php echo $linha['nome']; ?>"><br>
                        
                        <label for="origem">Origem</label><br>
                        <select name="origem" required>
                            <option value="">Selecione...</option>
                            <?php
                                $consulta = $conn->query("SELECT *
                                                            FROM lugares
                                                        ORDER BY nome");
                                while($lugares1 = $consulta->fetch(PDO::FETCH_ASSOC)){
                                    
                                    if($linha['origemId'] == $lugares1['idLugar']){
                                        
                                        echo "<option value='{$lugares1['idLugar']}' selected='selected'>{$lugares1['nome']}</option>";

                                    }

                                    echo "<option value='{$lugares1['idLugar']}'>{$lugares1['nome']}</option>";

                                }
                            ?>
                        </select><br>

                        <label for="destino">Destino</label><br>
                        <select name="destino" required>
                            <option value="">Selecione...</option>
                            <?php
                                $consulta = $conn->query("SELECT *
                                                            FROM lugares
                                                        ORDER BY nome");
                                while($lugares2 = $consulta->fetch(PDO::FETCH_ASSOC)){
                                    
                                    if($linha['destinoId'] == $lugares2['idLugar']){
                                        
                                        echo "<option value='{$lugares2['idLugar']}' selected='selected'>{$lugares2['nome']}</option>";

                                    }

                                    echo "<option value='{$lugares2['idLugar']}'>{$lugares2['nome']}</option>";

                                }
                            ?>
                        </select><br>
                        
                        <label for="dataHoraPartida">Data e horario da partida</label><br>
                        <input type="datetime-local" name="dataHoraPartida" value="<?php echo $linha['dataHoraPartida']; ?>"><br>

                        <label for="dataHoraChegada">Data e horario da chegada</label><br>
                        <input type="datetime-local" name="dataHoraChegada" value="<?php echo $linha['dataHoraChegada']; ?>"><br>

                        <label for="valor">Valor da viagem</label><br>
                        <span>R$</span>
                        <input type="number" step="0.01" min="0" name="valor" required value="<?php echo $linha['valor']; ?>"><br>           
                        <!-- <input type="text" od="valor" name="valor" required><br>            -->

                        <input type="submit">
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