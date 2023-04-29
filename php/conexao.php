<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "viagens";

try {
  $conn = new PDO("mysql:host=$servername;
  dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Erro ao conectar: " . $e->getMessage();
}

?>