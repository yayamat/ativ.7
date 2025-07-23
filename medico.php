<?php
require 'conexao.php';

// Criar médico
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];
    $stmt = $pdo->prepare("INSERT INTO medico (nome, especialidade) VALUES (?, ?)");
    $stmt->execute([$nome, $especialidade]);
    echo "Médico cadastrado com sucesso!";
}
?>

<h2>Cadastrar Médico</h2>
<form method="post">
    Nome: <input type="text" name="nome"><br>
    Especialidade: <input type="text" name="especialidade"><br>
    <input type="submit" value="Cadastrar">
</form>

<h3>Lista de Médicos</h3>
<?php
$stmt = $pdo->query("SELECT * FROM medico");
foreach ($stmt as $row) {
    echo "ID: {$row['id']} - {$row['nome']} ({$row['especialidade']})<br>";
}
?>
