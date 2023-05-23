<?php
session_start();
require 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Pessoas</title>
    <link rel="stylesheet" href="css/novos_estilos.css">
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
</head>
<body>
<?php
    require "topo.php";

    if(isset($_SESSION['idPessoa']) && ($_SESSION["funcaoId"] == 1 || $_SESSION["funcaoId"] == 3)){
        echo "
                    <h3>Listagem de Pessoas</h3>
                    <a href='cadastro_usuario.php'>Nova Pessoa</a><br>
                    <table>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>CEP</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>Bairro</th>
                            <th>Rua</th>
                            <th>numero do Prédio</th>
                            <th>Telefone</th>
                            <th></th>
                        </tr>";
                        
                        $consulta = $conn->query("SELECT *
                                                    FROM pessoas
                                                ORDER BY idPessoa,
                                                         nome");

                        while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                                if($linha["statusId"] == 2 || $linha["statusId"] == 3)
                                    echo "<tr style='color:red'>";
                                else
                                    echo "<tr>";

                                echo "
                                        <td>{$linha['nome']}</td>
                                        <td>{$linha['cpf']}</td>
                                        <td>{$linha['cep']}</td>
                                        <td>{$linha['estado']}</td>
                                        <td>{$linha['cidade']}</td>
                                        <td>{$linha['bairro']}</td>
                                        <td>{$linha['rua']}</td>
                                        <td>{$linha['numeroPredio']}</td>
                                        <td>{$linha['telefone']}</td>
                                        <td>
                                            <a href='editar_usuario.php?id={$linha['idPessoa']}'><i class='fas fa-edit'></i></a>
                                            <a href='desativar_pessoa.php?id={$linha['idPessoa']}'><i class='fas fa-ban'></i></a>
                                            <a href='ativar_pessoa.php?id={$linha['idPessoa']}'><i class='fas fa-check'></i></a>
                                        </td>
                                    </tr>";
                        }        
                    echo "</table>";
    }
    else{
        header("location: index.php");
    }
?>
</body>
</html>
