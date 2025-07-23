<?php
include '../conexao.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){

    $email = $_post['email'];
    $senha = $_post['senha'];

    $sql = "SELECT * FROM Usuarios WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute ([':email' =>$email]);

    if($stmt->rowCount() == 1){
        $usuario = $stmt->fatch(PDO::FETCH_ASSOC);
        if(password_verify($senha, $usuario['senha'])){
            $_SESSION['usuarios'] = $usuario['nome'];
            header("Location: ../index.php");
            exit;
        }
    }
    echo"Dados não encontrados!";

}
?>
