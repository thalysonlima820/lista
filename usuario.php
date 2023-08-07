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
    <title>Lista de Compras</title>
    <style>
        *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background-color: #000;
    }
    .login{
        background: rgba(0, 0, 0, .5);
        border-radius: 10px;
        width: 400px;
        padding: 40px;
    }
    .login h2{
        margin-bottom: 30px;
        font-size: 30px;
        color: #fff;
        text-align: center;
    }
    .login .box_user{
        position: relative;
    }
    .login .box_user input{
        width: 100%;
        padding: 10px 0;
        outline: none;
        border: 0;
        background: transparent;
        border-bottom: 1px solid #fff;
        color: #fff;
        font-size: 16px;
        margin-bottom: 30px;
    }
    .login .box_user label{
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        color: #fff;
        font-size: 16px;
        pointer-events: none;
        transition: .5s;
    }
    .login .box_user input:focus~label,
    .login .box_user input:valid~label {
        top: -20px;
        left: 0;
        color: #03e9f4;
        font-size: 12px;
    }
    .forget{
        font-size: 12px;
        color: #5b6b8b;
        display: flex;
        justify-content: end;
    }
    .btn{
        position: relative;
        display: inline-block;
        padding: 12px 20px;
        color: #03e9f4;
        text-decoration: none;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 4px;
        font-weight: 700;
        margin-top: 20px;
        transition: .5s;
        overflow: hidden;
        background-color: transparent;
        border:none;
        margin-left: 30%;
        margin-right: 50%;
    }
    .btn:hover{
        background-color: #03e9f4;
        box-shadow: 3px 4px 82px #03e9f4;

        border-radius: 5px;
        color: #172031;
    }
    .btn span{
        position: absolute;
        display: block;
    }
    .btn span:nth-child(1){
        top: 0;
        left: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, transparent, #03e9f4);
        animation: btn1 1s linear infinite;
    }
    @keyframes btn1 {
        0%{
            left: -100%;
        }
        50%,
        100%{
            left: 100%;
        }
    }
    .btn span:nth-child(2){
        top: -100%;
        right: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #03e9f4);
        animation: btn2 1s linear infinite;
        animation-delay: .20s;
    }
    @keyframes btn2 {
        0%{
            top: -100%;
        }
        50%,
        100%{
            top: 100%;
        }
    }
    .btn span:nth-child(3){
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(270deg, transparent, #03e9f4);
        animation: btn3 1s linear infinite;
        animation-delay: .45s;
    }
    @keyframes btn3 {
        0%{
            right: -100%;
        }
        50%,
        100%{
            right: 100%;
        }
    }
    .btn span:nth-child(4){
       bottom: -100%;
       left: 0;
       width: 4px;
       height: 100%;
        background: linear-gradient(360deg, transparent, #03e9f4);
        animation: btn4 1s linear infinite;
        animation-delay: .70s;
    }
    @keyframes btn4 {
        0%{
            bottom: -100%;
        }
        50%,
        100%{
            bottom: 100%;
        }
    }
    @media(max-width: 405px){
        .login{

        width: 90%;

    }
    }



  </style>
</head>
<body>
    <form action="usuario.php" method="post" class="login">
        <h2>Crie Sua Lista De Compras</h2>
        <div class="box_user">
            <input type="text" id="txt" name="usuario"  required>
            <label for="txt">Nome da Sua Lista: </label>
        </div>
     

       
       <button type="submit" class="btn"  name="enviar" >
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Criar
            </button>
    </form>
</body>
</html>