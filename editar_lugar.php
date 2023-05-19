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
                          FROM lugares
                         WHERE idLugar = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                if($stmt->rowCount() == 1){
                    $linha = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <h3>Edição de Pessoas</h3>
                    <form name="form1" action="atualizar_lugar.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $linha['idLugar']; ?>"><br>

                        <label for="nome">Nome</label><br>
                        <input type="text" name="nome" maxlength="50" value="<?php echo $linha['nome']; ?>"><br>

                        <label for="cpf">País</label><br>
                        <input type="text" name="pais" maxlength="50" value="<?php echo $linha['pais']; ?>"><br>

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