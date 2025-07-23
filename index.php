<?php
session_start();

include 'ativ.7/conexao.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
echo "Ben vindo ao Sistema de consultas " . htmlspecialchars($_SESSION['user_nome']) . "! <a href='logout.php'>Logout</a>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
<h1></h1>
<ul>
  <li><a href="medico.php">Médicos</a></li>
  <li><a href="paciente.php">Pacientes</a></li>
  <li><a href="consulta.php">Consultas</a></li>
</ul>

</body>
</html>