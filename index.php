<?php
session_start(); 

include_once('conexao.php');


if (isset($_SESSION['nome_usuario'])) {
    $nomeUsuario = $_SESSION['nome_usuario'];
} else {
    // Redireciona para o cadastro se o nome de usuário não estiver na sessão
    header('location: usuario.php');
    exit();
}


if(isset($_POST['enviar'])){

    // Verificar se o campo 'qtd' foi preenchido
    if(isset($_POST['qtd']) && !empty($_POST['qtd'])){

        $produto = mysqli_escape_string($conexao, $_POST['produto']);
        $produto = strtoupper($produto);

        $qtd = mysqli_escape_string($conexao, $_POST['qtd']);

        $nomeUsuario = $_SESSION['nome_usuario'];

        $sql = "INSERT INTO produto (produto, qtd, vl, usuario) VALUES ('$produto', '$qtd', '', '$nomeUsuario')";


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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de compras</title>
    <link rel="stylesheet" href="css.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</head>
<body>

<h1>LISTA <?php echo $nomeUsuario; ?></h1>


    <form action="index.php" method="post" class="formulario">
        <label for="texto">Adicionar Produto:</label>
        <input type="text" id="add" name="produto">
    <br>
        <label for="texto">Quantidade:</label>
        <input type="number" step="0.01" id="add" name="qtd">
        <input type="submit" value="+" name="enviar" >
    </form>
<br>
<br>


    <a href="sair.php">novo</a>

    <div class="tabelas">
        <h3 class="txt">TOTAL</h3>
        <p>
        <?php
   // Após adicionar um novo produto
   // ...

   $sql_sum = "SELECT SUM(qtd * vl) AS soma FROM produto where usuario = '$nomeUsuario'";
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
    $sqll = "SELECT * FROM produto where usuario = '$nomeUsuario'";
    $resutadol = mysqli_query($conexao, $sqll);
    while ($dados = mysqli_fetch_array($resutadol)) {
    ?>
        <tr>
            <td class="conteudo"><?php echo $dados['produto'] ?></td>
            <td class="conteudo"><?php echo $dados['qtd'] ?></td>
            <td class="conteudo">
                <?php
                // Verificar e formatar o campo 'vl' apenas se for um número válido
                if (is_numeric($dados['vl'])) {
                    echo number_format($dados['vl'], 2, ',', '.');
                } else {
                    // Se não for numérico, você pode exibir um valor padrão ou apenas deixar vazio
                    echo '-';
                }
                ?>
            </td>
            <td class="acoes"><a href="kl.php?id=<?php echo $dados['id']; ?>"><i class="">Mult</i></a></td>
            <td class="acoes"><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i ><ion-icon class="ico" name="create-outline"></ion-icon></i></a></td>
            <td class="acoes">
                <form action="deletar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                    <button class="bbtt" type="submit" name="deletar" class="btn red"><i class=""> <ion-icon class="ico" name="trash-outline"></ion-icon></i></button>
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