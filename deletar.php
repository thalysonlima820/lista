<?php
session_start();
include_once('conexao.php');



if(isset($_POST['deletar'])):
    $id = mysqli_escape_string($conexao, $_POST['id']);

    $sqli = "DELETE FROM produto WHERE id = '$id'";

    if(mysqli_query($conexao, $sqli)):

       header('location: index.php');
    else:

       header('location: index.php');
    endif;
endif;
?>
</html>