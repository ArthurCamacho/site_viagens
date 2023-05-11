<?php
    require_once("topo.php");
    require_once("funcoes.php");
    if(validarSessao()){
?>
    <h3>Cadastro de Dependentes</h3>
    <form name="form1" action="inserirdependente.php"
    method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" 
    placeholder="Digite seu nome"
    required maxlength="100"><br>

    <label for="email">E-mail</label>
    <input type="text" name="email" 
    placeholder="Digite seu e-mail"
    required maxlength="100"><br>

    <label for="cpf">CPF</label>
    <input type="text" name="cpf" 
    placeholder="Digite seu CPF"
    required maxlength="14"><br>

    <label for="telefone">Telefone</label>
    <input type="tel" name="telefone" 
    placeholder="Digite seu telefone"><br>

    <input type="submit" value="Cadastrar">
    <input type="reset" value="Cancelar">
    </form>
    <?php
}else{
    echo "<p>Você precisa estar cadastrado e realizar o login para cadastrar um dependente.</p>";
    echo "<p>Clique <a href='login.php'>aqui</a> para realizar seu login.</p>";
    echo "<p>Não é cadastrado? Clique <a href='cadastrese.php'>aqui</a> para criar seu cadastro.</p>";
}
require_once ("rodape.php");
?>