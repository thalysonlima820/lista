<?php
session_start(); 

include_once('conexao.php');


if(isset($_GET['id'])):
    $id= mysqli_escape_string($conexao, $_GET['id']);

    $sql = "SELECT * FROM produto WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>
<body>

<form action="update_kl.php" method="post" class="">
       <input type="hidden" name="id" value="<?php  echo $dados['id'];?>" >
       <label  class="incl1" for="produto" >Produto:</label>
            <input type="text" name="produto" class="incl" value=" <?php  echo $dados['produto'];   ?>">

<br>
            <label  class="incl1" for="kl" >Valor do KL:</label>
            <input type="number" name="kl" class="incl" value=" ">
<br>
            <label  class="incl1" for="val" >KL:</label>
            <input type="number" name="val" class="incl" value=" ">

<br>
<br>
            <input type="submit" name="editar" value="Editar"  id="cadastrar_btn">
            <a href="index.php" id="bbtt">Cancelar</a>
       </form> 

</body>
</html>