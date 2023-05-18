<?php
    require "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash | Cadastrar</title>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>   
    <script>
        $(document).ready(function() {
            $('#valor').mask('#.##0,00', {reverse: true});
        })
    </script>
</head>
<body>
    <?php
    session_start();
    require "topo.php";
    ?>
    <form action="inserir_viagem.php" method="POST">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" maxlength="50"><br>
        
        <label for="origem">Origem</label><br>
        <select name="origem" required>
            <option value="">Selecione...</option>
            <?php
                $consulta = $conn->query("SELECT *
                                            FROM lugares
                                        ORDER BY nome");
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$linha['idLugar']}'>{$linha['nome']}</option>";
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
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                echo "<option value='{$linha['idLugar']}'>{$linha['nome']}</option>";
                }
                ?>
        </select><br>
        
        <label for="dataHoraPartida">Data e horario da partida</label><br>
        <input type="datetime-local" name="dataHoraPartida"><br>

        <label for="dataHoraChegada">Data e horario da chegada</label><br>
        <input type="datetime-local" name="dataHoraChegada"><br>

        <label for="valor">Valor da viagem</label><br>
        <span>R$</span>
        <input type="number" step="0.01" min="0" name="valor" required><br>           
        <!-- <input type="text" od="valor" name="valor" required><br>            -->

        <input type="submit">
    </form><br>
</body>
</html>