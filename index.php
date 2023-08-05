<?php
session_start(); 

include_once('conexao.php');


if(isset($_POST['enviar'])){

    // Verificar se o campo 'qtd' foi preenchido
    if(isset($_POST['qtd']) && !empty($_POST['qtd'])){

        $produto = mysqli_escape_string($conexao, $_POST['produto']);
        $produto = strtoupper($produto);

        $qtd = mysqli_escape_string($conexao, $_POST['qtd']);

        $sql = "INSERT INTO produto (produto, qtd, vl) VALUES ('$produto', '$qtd', 0.00)";


        if(mysqli_query($conexao, $sql)){
            header('location: index.php');
        } else{
            echo 'erro!';
        }
    } else {
        echo 'O campo quantidade (qtd) deve ser preenchido!';
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
        .tabela{
            margin-top: 50px;
            position: absolute;
    align-items: center;
    justify-content: center;
        }
        
 table, th, td{

border-collapse: collapse;
padding: 5px 2px 5px 2px;

}
table{
width: 100px;
}
.conteudo{
align-items: left;

}
.acoes{
text-align: center;
}

.titu{
border-top-left-radius: 10px;

}
.tituu{
border-top-right-radius: 10px;

}


th{
background-color: #264696;
}
td{
background-color: white;
color: black;
border: 1px solid #444;
padding: 10px;
}
tr:hover{
background-color: #5e84e2;
}
.bbtt{
border: none;
background-color: transparent;
}

.tabelas{
    width: 200px;
    height: 80px;
    margin: 10px;
    border-radius: 20px;
    margin-top: 10px;
}
.txt{
    z-index: 999;
    color: black;
}
.tabelas p{
    color: black;
    font-size: 2em;
    
    justify-content: center;
    margin-top: 10px ;
}
.tet{
    
}
.bt{
    border:none;
    background: transparent;
}
.acoes a{
    text-decoration: none;
    color:black;
}
    </style>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>




    <form action="index.php" method="post" class="formulario">
        <label for="texto">Adicionar Produto:</label>
        <input type="text" id="add" name="produto">
    <br>
        <label for="texto">Quantidade:</label>
        <input type="number" id="add" name="qtd">
        <input type="submit" value="+" name="enviar" >
    </form>



    <div class="tabelas">
        <h3 class="txt">TOTAL</h3>
        <p>
        <?php
   // Após adicionar um novo produto
   // ...

   $sql_sum = "SELECT SUM(qtd * vl) AS soma FROM produto";
   $resul_sum = mysqli_query($conexao, $sql_sum);
   $dados_sum = mysqli_fetch_array($resul_sum);
   
   $soma = $dados_sum['soma'];
   
   // Formate o valor com 2 casas decimais
   $soma_formatada = number_format($soma, 2, ',', '.');
   
   echo "R$ " . $soma_formatada;
   


?>
        </p>
        </div>


    <div class="tabela">
            <table class="the">
                <thead >
                    <tr >
                        <th class="titu" class="conteudo">Nome</th>
                        <th>QTD</th>
                        <th>Valor</th>
                        <th>KL</th>
                        <th class="acoes">Editar</th>


                        <th class="acoes tituu">Deletar</th>
                    </tr>
                </thead >
                <tbody id="resultado8">
    <?php
    $sqll = "SELECT * FROM produto";
    $resutadol = mysqli_query($conexao, $sqll);
    while ($dados = mysqli_fetch_array($resutadol)) {
    ?>
        <tr>
            <td class="conteudo"><?php echo $dados['produto'] ?></td>
            <td class="conteudo"><?php echo $dados['qtd'] ?></td>
            <td class="conteudo">
                <?php
                // Verificar se o campo 'vl' é numérico antes de exibi-lo
                if (is_numeric($dados['vl'])) {
                    echo $dados['vl'];
                } else {
                    echo 'Valor inválido';
                }
                ?>
            </td>
            <td class="acoes"><a href="kl.php?id=<?php echo $dados['id']; ?>"><i class="">Mult</i></a></td>
            <td class="acoes"><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="">Editar</i></a></td>
            <td class="acoes">
                <form action="deletar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                    <button class="bbtt" type="submit" name="deletar" class="btn red"><i class="">Deletar</i></button>
                </form>
            </td>
        </tr>
    <?php } ?>
</tbody>

            </table>
        </div>

       
    
</body>


<script>
     $(function() {
      $(".conteudo").click(function() {
        $(this).closest("tr").find("td").css("background", "yellow");
      }),
      $(".conteudo").dblclick(function() {
        $(this).closest("tr").find("td").css("background", "");
      })
    });
</script>
</html>