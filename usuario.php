<?php
session_start();

include_once('conexao.php');

if(isset($_POST['enviar'])){
    if(!empty($_POST['usuario'])){
        $usuario = mysqli_escape_string($conexao, $_POST['usuario']);
        $usuario = strtoupper($usuario);

        $sql = "INSERT INTO nome (usuario) VALUES ('$usuario')";

        if(mysqli_query($conexao, $sql)){
            // Armazena o nome de usuário na sessão
            $_SESSION['nome_usuario'] = $usuario;
            header('location: index.php'); // Redireciona para a página de boas-vindas
        } else{
            echo 'erro!';
        }
    } else {
        echo 'O campo Nome da Sua Lista deve ser preenchido!';
    }
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            color:red;
        }
        .tabela label,input{
            color:black;
        }
    </style>
</head>
<body>
    <form action="usuario.php" method="post" class="tabela">
        <label for="txt">Nome da Sua Lista: </label>
        <input type="text" id="txt" name="usuario">
        
        <input type="submit" value="enviar" name="enviar">
    </form>
</body>
</html>