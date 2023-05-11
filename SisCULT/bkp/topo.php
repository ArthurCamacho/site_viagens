<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisCULT</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div class="scrollmenu">
        <a href="index.php">Início</a>

    <?php
    require_once("funcoes.php");
    if(validarSessao()){

        echo "
        <a href='listarpessoas.php'>Pessoas</a>
        <a href='listarlocais.php'>Locais</a>
        <a href='listarcursos.php'>Cursos</a>
        <a href='listarturmas.php'>Turmas</a>
        <a href='listarstatus.php'>Status</a>
        <a href='logout.php'>Logout</a>";
        echo "<a href='editarperfil.php'><span style='color:red;margin-left=25px;'> | "
        .$_SESSION['nomeUsuario']." | </span></a>";
    } else{
        echo "<a href='login.php'>Login</a>";
    }
    ?>
    
    </div>
    <span class="login100-form-title p-b-26" style="margin-top:30px">
		SisCULT
	</span>