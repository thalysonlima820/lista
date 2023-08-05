<?php
session_start();
include_once('conexao.php');


if (isset($_POST['editar'])):

    $produto =  mysqli_escape_string($conexao,  $_POST['produto']);
    $produto = strtoupper($produto);


    $qtd =  mysqli_escape_string($conexao,  $_POST['qtd']);
    $vl =  mysqli_escape_string($conexao,  $_POST['vl']);
    $vl = str_replace(',', '.', $vl);


    $id = mysqli_escape_string($conexao, $_POST['id']);

    $sql = "UPDATE produto SET produto = '$produto', vl = '$vl' , qtd = '$qtd'WHERE id = '$id'";



    if(mysqli_query($conexao, $sql)){
        header('location: index.php');
    } else{
        echo 'erro!';
    }

endif;



?>