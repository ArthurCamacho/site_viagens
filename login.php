<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash | Login</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f2f2f2;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.login-form h1 {
    text-align: center;
    margin-bottom: 20px;
}

.login-form label {
    display: block;
    margin-bottom: 5px;
}

.login-form input[type="text"],
.login-form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

.login-form input[type="submit"] {
    background-color: #4caf50;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.login-form a {
    display: block;
    text-align: center;
    margin-top: 15px;
    text-decoration: none;
    color: #4caf50;
}

.text-container {
    background-image: url("capa_loguin.jpg");
    background-size: cover;
    background-position: center;
    padding: 20px;
    border-radius: 5px;
    color: #ffffff;
    text-align: center;
}

.cruise-images {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.cruise-images img {
    width: 100px;
    height: 100px;
    margin: 0 10px;
    border-radius: 50%;
}
</style>
    <body>
    <div class="container">
        <div class="login-form">
            <h1>Login</h1>
            <form action="validar_login.php" method="POST">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf">
                <label for="senha">Senha</label>
                <input type="password" name="senha">
                <input type="submit" value="Login">
            </form>
            <a href="cadastro_usuario.php">Cadastre-se</a>
        </div>
    </div


