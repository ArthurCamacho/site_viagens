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
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'> -->
</head>
<body>
<?php
    require "topo.php";

    if(isset($_SESSION['idPessoa']) && ($_SESSION["funcaoId"] == 1 || $_SESSION["funcaoId"] == 3)){
        echo "
                    <h3>Listagem de viagens</h3>
                    <a href='cadastro_viagem.php'>Nova Viagem</a><br>
                    <table>
                        <tr>
                            <th>Nome</th>
                            <th>Partida</th>
                            <th>Chegada</th>
                            <th>Data de inicio</th>
                            <th>Data de conclusão</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>";
                        
                        $consulta = $conn->query("SELECT v.nome as nomeViagem,
                                                         v.dataHorarioPartida,
                                                         v.dataHorarioChegada,
                                                         v.valor,
                                                         v.statusId,
                                                         v.idViagem,
                                                         o.nome as nomePartida,
                                                         d.nome as nomeDestino
                                                    FROM viagens v
                                              INNER JOIN lugares o ON v.origemId = o.idLugar
                                              INNER JOIN lugares d ON v.destionId = d.idLugar
                                                ORDER BY v.idViagem,
                                                         v.nome");

                        while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                                if($linha["statusId"] == 2 || $linha["statusId"] == 3)
                                    echo "<tr style='color:red'>";
                                else
                                    echo "<tr>";

                                echo "  
                                <th>Nome</th>
                                <th>Partida</th>
                                <th>Chegada</th>
                                <th>Data de inicio</th>
                                <th>Data de conclusão</th>
                                <th>Valor</th>
                                <th>Ações</th>
                                        <td>{$linha['nomeViagem']}</td>
                                        <td>{$linha['nomePartida']}</td>
                                        <td>{$linha['nomeDestino']}</td>
                                        <td>{$linha['dataHorarioPartida']}</td>
                                        <td>{$linha['dataHorarioChegada']}</td>
                                        <td>{$linha['valor']}</td>
                                        <td>
                                            <a href='editar_viagem.php?id={$linha['idViagem']}'><i class='fas fa-edit'></i></a>
                                            <a href='desativar_viagem.php?id={$linha['idViagem']}'><i class='fas fa-ban'></i></a>
                                            <a href='ativar_viagem.php?id={$linha['idViagem']}'><i class='fas fa-check'></i></a>
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
