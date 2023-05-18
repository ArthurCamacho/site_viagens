<?php
    require "conexao.php";
    $consulta = $conn->query("SELECT *
                                FROM lugares
                            ORDER BY nome");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash | Cadastrar</title>
</head>
<body>
    <form action="php/inserir_usuario.php" method="POST">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" maxlength="50"><br>

        <label for="origem">Origem</label><br>
        <select name="origem" required>
            <?php
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$linha['idLugar']}'>{$linha['nome']}</option>";
                }
            ?>
        </select><br>

        <label for="destino">Destino</label><br>
        <select name="destino" required>
            <?php
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
        <input type="number"  name="valor"><br>        

        <label for="cidade">Cidade</label><br>
        <input type="text" name="cidade" maxlength="50"><br>

        <label for="estado">Estado (UF)</label><br>
        <input type="text" name="estado" maxlength="2"><br>

        <label for="telefone">Telefone</label><br>
        <input type="text" name="telefone" maxlength="20"><br>

        <label for="senha">Senha</label><br>
        <input type="password" name="senha" maxlength="50"><br>

        <input type="submit">
    </form><br>
</body>
</html>