<?php
require "conexao.php";
session_start();
if(isset($_SESSION["idPessoa"]) && (
    $_SESSION["funcaoId"] == 1 ||
    $_SESSION["funcaoId"] == 3
)){
    try{
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET["idpv"])&&
               isset($_GET["idv"])){
                $idpv = $_GET["idpv"];
                $idv = $_GET["idv"];
                $sql = "UPDATE pessoasviagens
                           SET statusId = 1
                         WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $idpv, PDO::PARAM_INT);
                $stmt->execute();
                header("location: listar_pessoas_reservas.php?id={$idv}");
            }
        }
    }
    catch(Exception $e){
        
    }
}
else{
    header("location: index.php");
}
?>