<?php
require 'conexao.php';

// Criar paciente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data = $_POST['data_nascimento'];
    $sangue = $_POST['tipo_sanguineo'];

    $stmt = $pdo->prepare("INSERT INTO paciente (nome, data_nascimento, tipo_sanguineo) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $data, $sangue]);

    echo "Paciente cadastrado com sucesso!";
}
?>

<h2>Cadastrar Paciente</h2>
<form method="post">
    Nome: <input type="text" name="nome"><br>
    Data de Nascimento: <input type="date" name="data_nascimento"><br>
    Tipo Sanguíneo: <input type="text" name="tipo_sanguineo"><br>
    <input type="submit" value="Cadastrar">
</form>

<h3>Lista de Pacientes</h3>
<?php
$stmt = $pdo->query("SELECT * FROM paciente");
foreach ($stmt as $row) {
    echo "ID: {$row['id']} - {$row['nome']} ({$row['tipo_sanguineo']})<br>";
}
?>
