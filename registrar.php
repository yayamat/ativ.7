<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <h2>Registrar Usuário</h2>

<form action="acoes/registrar.php" method="POST">
Nome: <input type="text" name="nome" required><br>
Email: <input type="email" name="email" required><br>
Senha: <input type="password" name="senha" required><br>
<input type="submit" value="Registrar">

</form>



</body>
</html>