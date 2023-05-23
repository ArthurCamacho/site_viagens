<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash | Cadastro</title>
</head>
<body>
    <?php
    session_start();
    require "topo.php";
    ?>

    <form action="inserir_usuario.php" method="POST">
        <input type="hidden" name="funcao" value="2"><br>

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
        <select type="text" name="estado" maxlength="2" required>
            <option value="">Selecione...</option>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
            <option value="AM">AM</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MT">MT</option>
            <option value="MS">MS</option>
            <option value="MG">MG</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PR">PR</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>
        </select><br>

        <label for="telefone">Telefone</label><br>
        <input type="text" name="telefone" maxlength="20"><br>

        <label for="senha">Senha</label><br>
        <input type="password" name="senha" maxlength="50"><br>

        <input type="submit">
    </form><br>
</body>
</html>