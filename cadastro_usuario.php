<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash | Cadastro</title>
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link rel="stylesheet" href="css/cadastro_usuario.css">

</head>
<body>
    <div class="container">
        <div class="registration-form">
            <h1>Cadastro</h1>
            <form action="inserir_usuario.php" method="POST">
                <input type="hidden" name="funcao" value="2">
                <label for="nome">Nome completo</label>
                <input type="text" name="nome" maxlength="80">

                <label for="cpf">CPF</label>
                <input type="text" name="cpf" maxlength="11">

                <label for="cep">CEP</label>
                <input type="text" name="cep" maxlength="8">

                <label for="rua">Rua</label>
                <input type="text" name="rua" maxlength="50">

                <div style="display: flex; gap: 10px;">
                    <div style="flex-grow: 1;">
                        <label for="numeroPredio">Número</label>
                        <input type="number" name="numeroPredio" maxlength="11">
                    </div>
                    
                    <div style="flex-grow: 1;">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" maxlength="50">
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <div style="flex-grow: 1;">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" maxlength="50">
                    </div>

                    <div style="flex-grow: 1;">
                        <label for="estado">Estado (UF)</label>
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
                        </select>
                    </div>
                </div>

                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" maxlength="20">

                <label for="senha">Senha</label>
                <input type="password" name="senha" maxlength="50">

                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </div>
</body>
</html>
