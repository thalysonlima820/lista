<?php
session_start();
include_once('conexao.php');


if (isset($_POST['editar'])):

    $produto =  mysqli_escape_string($conexao,  $_POST['produto']);
    $produto = strtoupper($produto);


    $kl = mysqli_escape_string($conexao, $_POST['kl']);
    $kl = str_replace(',', '.', $kl);
    
    $val = mysqli_escape_string($conexao, $_POST['val']);
    $val = str_replace(',', '.', $val);
    
    // Converter as variáveis $kl e $val para números decimais (float)
    $precoPorKilo = floatval($kl);
    $quantidadeComprada = floatval($val);
    
    // Calcular o valor total da compra
    $totalCompra = $precoPorKilo * $quantidadeComprada;
    







    $id = mysqli_escape_string($conexao, $_POST['id']);

    $sql = "UPDATE produto SET produto = '$produto', vl = '$totalCompra'  WHERE id = '$id'";



    if(mysqli_query($conexao, $sql)){
        header('location: index.php');
    } else{
        echo 'erro!';
    }

endif;



?>