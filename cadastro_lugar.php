<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash | Cadastrar</title>
</head>
<body>
    <?php
    session_start();
    require "topo.php";
    ?>

    <form action="inserir_lugar.php" method="POST">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" maxlength="50"><br>

        <label for="cpf">País</label><br>
        <input type="text" name="pais" maxlength="50"><br>

        <input type="submit">
    </form><br>
</body>
</html>