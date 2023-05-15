<?php
session_start();
require 'php/conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Pessoas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        h3 {
            margin-top: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .red-row {
            color: red;
        }
        
        .add-button {
            margin-bottom: 10px;
        }
        
        .add-button a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
        }
        
        .add-button a:hover {
            background-color: #45a049;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th {
            background-color: #ddd;
            font-weight: bold;
            text-align: center;
        }

        th, td {
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: black;
            margin-right: 10px;
        }

        a:hover {
            color: blue;
        }

        td:last-child {
            text-align: center;
        }
</style>
</head>
<body>
<?php

    if(isset($_SESSION['idPessoa']) && ($_SESSION["funcaoId"] == 1 || $_SESSION["funcaoId"] == 3)){
        echo "
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset='utf-8'>
                    <title>Listagem de Pessoas</title>
                    <link rel='stylesheet' type='text/css' href='css/style.css'>
                    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
                </head>
                <body>
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
                            <th>Ações</th>
                        </tr>";
                        
                        $consulta = $conn->query("SELECT p.nome,
                                                        p.cpf,
                                                        p.rua,
                                                        p.numeroPredio,
                                                        p.cep,
                                                        p.bairro,
                                                        p.cidade,
                                                        p.estado,
                                                        p.telefone,
                                                        s.status,
                                                        p.idPessoa
                                                    FROM pessoas p, status s
                                                WHERE p.statusId = s.idStatus
                                                ORDER BY p.idPessoa,
                                                        p.nome");

                        while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                                if($linha["status"] == 2 || $linha["status"] == 3)
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
                                            <a href='php/desativar_pessoa.php?id={$linha['idPessoa']}'><i class='fas fa-ban'></i></a>
                                            <a href='php/ativar_pessoa.php?id={$linha['idPessoa']}'><i class='fas fa-check'></i></a>
                                        </td>
                                    </tr>";
                        }        
                    echo "</table>
                </body>
            </html>";
    }
    else{
        header("location: ../index.php");
    }
?>
</body>
</html>
