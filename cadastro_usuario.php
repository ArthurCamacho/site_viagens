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
        <input type="text" name="nome" maxlength="80"><br>

        <label for="cpf">CPF</label><br>
        <input type="text" name="cpf" maxlength="11"><br>

        <label for="cep">CEP</label><br>
        <input type="text" name="cep" maxlength="8"><br>
        
        <label for="rua">Rua</label><br>
        <input type="text" name="rua" maxlength="50"><br>

        <label for="numeroPredio">Número do prédio</label><br>
        <input type="number" name="numeroPredio" maxlength="11"><br>

        <label for="bairro">Bairro</label><br>
        <input type="text" name="bairro" maxlength="50"><br>

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