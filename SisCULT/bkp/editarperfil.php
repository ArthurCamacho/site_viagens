<?php
    require_once("topo.php");
    require_once("conexao.php");
    require_once("funcoes.php");
    if(validarSessao() && $_SESSION['idUsuario']<>0){
        $sql = "SELECT * from tbpessoas where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_SESSION['idUsuario'], PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->rowCount() == 1){//verifica se achou o registro do usuário no banco
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);//pega os dados do registro e armazena no vetor $linha
?>
    <h3>Perfil</h3>
    <form name="form1" action="atualizarperfil.php"
    method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" 
    placeholder="Digite seu nome"
    value="<?php echo $linha['nome']; ?>"
    required maxlength="100"><br>

    <label for="email">E-mail</label>
    <input type="text" name="email" 
    placeholder="Digite seu e-mail"
    value="<?php echo $linha['email']; ?>"
    required maxlength="100"><br>

    <label for="endereco">Endereço</label>
    <input type="text" name="endereco" 
    placeholder="Digite seu endereço"
    value="<?php echo $linha['endereco']; ?>"
    required maxlength="300"><br>

    <label for="senha">Senha</label>
    <input type="password" name="senha" 
    value="<?php echo $linha['senha']; ?>"
    required maxlength="20"><br>

    <label for="cpf">CPF</label>
    <input type="text" name="cpf" 
    placeholder="Digite seu CPF"
    value="<?php echo $linha['cpf']; ?>"
    required maxlength="14"><br>

    <label for="telefone">Telefone</label>
    <input type="tel" name="telefone" 
    placeholder="Digite seu telefone"
    value="<?php echo $linha['telefone']; ?>"
    required><br>
    <input type="submit" value="Cadastrar">
    <input type="reset" value="Cancelar">
    </form>
<?php
        }//fim do if encontrou o registro
        else{
            echo "<p>Registro não encontrado.</p>";
        }
    }//fim do if validarUsuario
require_once ("rodape.php");
?>