<?php
    require_once("topo.php");
?>
    <h3>Cadastro de Pessoas</h3>
    <form name="form1" action="inserirnovocadastro.php"
    method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" 
    placeholder="Digite seu nome"
    required maxlength="100"><br>

    <label for="email">E-mail</label>
    <input type="text" name="email" 
    placeholder="Digite seu e-mail"
    required maxlength="100"><br>

    <label for="endereco">Endereço</label>
    <input type="text" name="endereco" 
    placeholder="Digite seu endereço"
    required maxlength="300"><br>

    <label for="senha">Senha</label>
    <input type="password" name="senha" 
    required maxlength="20"><br>

    <label for="cpf">CPF</label>
    <input type="text" name="cpf" 
    placeholder="Digite seu CPF"
    required maxlength="14"><br>

    <label for="telefone">Telefone</label>
    <input type="tel" name="telefone" 
    placeholder="Digite seu telefone"
    required><br>
    <input type="submit" value="Cadastrar">
    <input type="reset" value="Cancelar">
    </form>
    <?php
require_once ("rodape.php");
?>