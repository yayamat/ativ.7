<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $medico = $_POST['id_medico'];
    $paciente = $_POST['id_paciente'];
    $data_hora = $_POST['data_hora'];
    $obs = $_POST['observacoes'];

    $stmt = $pdo->prepare("INSERT INTO consulta (id_medico, id_paciente, data_hora, observacoes) VALUES (?, ?, ?, ?)");
    $stmt->execute([$medico, $paciente, $data_hora, $obs]);

    echo "Consulta registrada com sucesso!";
}
?>

<h2>Registrar Consulta</h2>
<form method="post">
    Médico:
    <select name="id_medico">
        <?php
        $medicos = $pdo->query("SELECT * FROM medico");
        foreach ($medicos as $m) {
            echo "<option value='{$m['id']}'>{$m['nome']} ({$m['especialidade']})</option>";
        }
        ?>
    </select><br>

    Paciente:
    <select name="id_paciente">
        <?php
        $pacientes = $pdo->query("SELECT * FROM paciente");
        foreach ($pacientes as $p) {
            echo "<option value='{$p['id']}'>{$p['nome']}</option>";
        }
        ?>
    </select><br>

    Data e Hora: <input type="datetime-local" name="data_hora"><br>
    Observações: <textarea name="observacoes"></textarea><br>
    <input type="submit" value="Registrar Consulta">
</form>

<h3>Consultas Registradas</h3>
<?php
$stmt = $pdo->query("SELECT c.*, m.nome AS medico_nome, p.nome AS paciente_nome 
    FROM consulta c 
    JOIN medico m ON c.id_medico = m.id 
    JOIN paciente p ON c.id_paciente = p.id
    ORDER BY data_hora DESC");

foreach ($stmt as $row) {
    echo "<p><strong>{$row['data_hora']}</strong>: {$row['medico_nome']} atendeu {$row['paciente_nome']}<br>Obs: {$row['observacoes']}</p>";
}
?>
