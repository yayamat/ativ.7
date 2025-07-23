<?php

include '../conexao.php';

if($_SERVER['REQUEST_METHOD']=='post'){

    $nome = $post['nome'];
    $email = $post['email'];
    $senha = password_hash($_POST['senha'], password_default);

    $sql = "INSERT INTO Usuarios (nome,email,senha) values (:nome, :email,:senha)";
    $stmt = $pdo->prepare($sql);
    
    if($stmt->execute([':nome' => $nome, ':email' => $email, ':senha' => $senha])){
        echo"Usuário registrado com sucesso! <a href='../login.php'>Fazer login</a>";
    
    }else{
        $error = $stm->errorinfo();
        echo "Erro! " . $error[2];
        }

}











?>