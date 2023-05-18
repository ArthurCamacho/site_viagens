<?php
require "conexao.php";
session_start();
if(isset($_SESSION["idPessoa"]) && (
    $_SESSION["funcaoId"] == 1 ||
    $_SESSION["funcaoId"] == 3
)){
    try{
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $sql = "UPDATE lugares
                           SET statusId = 1
                         WHERE idLugar = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                header("location: gerenciar_lugares.php");
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