<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash | Login</title>
</head>
<body>
    <form action="php/validar_login.php" method="POST">
        <label for="email">Email</label><br>
        <input type="text" name="email"><br>
        <label for="senha">Senha</label><br>
        <input type="text" name="senha"><br>
        <input type="submit">
    </form><br>
    <a href="cadastro_usuario.php">Casdastre-se</a>
</body>
</html>