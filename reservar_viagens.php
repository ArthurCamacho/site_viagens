<?php
session_start();
require 'conexao.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Listagem de viagens</title>
        <link rel="stylesheet" href="css/novos_estilos.css">
        <meta charset='utf-8'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    </head>
    <body>
        <?php
        require "topo.php";
        ?>
        <h3>Listagem de viagens</h3>
    <table>
        <tr>
            <th>Nome</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Data de inicio</th>
            <th>Data de conclusão</th>
            <th>Valor</th>
            <th></th>
        </tr>
        <?php

            $consulta = $conn->query("SELECT v.nome as nomeViagem,
                                                v.dataHoraPartida,
                                                v.dataHoraChegada,
                                                v.valor,
                                                v.statusId,
                                                v.idViagem,
                                                o.nome as nomePartida,
                                                d.nome as nomeDestino
                                        FROM viagens v
                                    INNER JOIN lugares o ON v.origemId = o.idLugar
                                    INNER JOIN lugares d ON v.destinoId = d.idLugar
                                      ORDER BY v.nome,
                                               v.idViagem");

            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                if($linha["statusId"] == 2 || $linha["statusId"] == 3)
                    echo "<tr style='color:red'>";
                else
                    echo "<tr>";

                echo "  <td>{$linha['nomeViagem']}</td>
                        <td>{$linha['nomePartida']}</td>
                        <td>{$linha['nomeDestino']}</td>
                        <td>{$linha['dataHoraPartida']}</td>
                        <td>{$linha['dataHoraChegada']}</td>
                        <td>{$linha['valor']}</td>
                        <td><a href='reserva_viagem_pessoa.php?id={$linha['idViagem']}'>Reservar viagem</a></td>
                    </tr>";
                
            }                    
        ?>
    </table>
</body>
</html>
