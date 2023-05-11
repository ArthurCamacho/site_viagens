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
        <label for="email">Email</label><br>
        <input type="email" name="email" maxlength="150"><br>

        <label for="senha">Senha</label><br>
        <input type="text" name="senha" maxlength="50"><br>

        <label for="nomeCompleto">Nome completo</label><br>
        <input type="text" name="nomeCompleto" maxlength="50"><br>

        <label for="dataNascimento">Data de nascimento</label><br>
        <input type="date" name="dataNascimento"><br>

        <label for="cpf">CPF</label><br>
        <input type="number" name="cpf" maxlength="11"><br>

        <input type="submit">
    </form><br>
</body>
</html>