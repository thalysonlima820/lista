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

<form action="update.php" method="post" class="">
       <input type="hidden" name="id" value="<?php  echo $dados['id'];?>" >
       <label  class="incl1" for="produto" >Produto:</label>
            <input type="text" name="produto" class="incl" value=" <?php  echo $dados['produto'];   ?>">

<br>
            <label  class="incl1" for="qtd" >Quantidade:</label>
            <input type="number" step="0.01" name="qtd" class="incl" value="<?php echo number_format($dados['qtd'], 2, '.', ''); ?>">
<br>
            <label  class="incl1" for="vl" >Valor:</label>
            <input type="number" step="0.01" name="vl" class="incl" value=" <?php  echo $dados['vl'];   ?>">

<br>
<br>
            <input type="submit" name="editar" value="Editar"  id="cadastrar_btn">
            <a href="index.php" id="bbtt">Cancelar</a>
       </form> 

</body>
</html>