<?php
function testarEntrada($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING);
    return $data;
}
function validarSessao(){
    //session_start();
    return isset($_SESSION['idUsuario']);
}
?>