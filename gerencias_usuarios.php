<?php
session_start();
require 'php/conexao.php';

if(isset($_SESSION['idPessoa']) && 
    ($_SESSION["funcaoId"] == 1 || $_SESSION["funcaoId"] == 3)){
        echo "<h3>Listagem de Pessoas</h3>";
        echo "<a href='cadastro_usuario.php'>Nova Pessoa</a><br>";

        $consulta = $conn->query("SELECT p.nome,
                                         p.cpf,
                                         p.rua,
                                         p.numeroPredio,
                                         p.cep,
                                         p.bairro,
                                         p.cidade,
                                         p.estado,
                                         p.telefone,
                                         s.status
                                    FROM pessoas p, status s
                                   WHERE p.statusId = s.idStatus
                                ORDER BY p.idPessoa");
   }
?>