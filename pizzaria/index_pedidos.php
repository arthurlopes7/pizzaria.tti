<?php
include('./conector.php');

$sql = "SELECT 
numero_pedido
, clientes.nome AS nome_do_cliente
, clientes.telefone
, motoboy.nome AS nome_motoboy
, sum(itens_pedido.quantidade) AS quantidade_total
, sum(itens_pedido.quantidade * itens_pedido.valor) AS valor_total
FROM pedidos
INNER JOIN clientes
	ON clientes.id = id_cliente
INNER JOIN motoboy
ON motoboy.id = id_motoboy  
INNER JOIN itens_pedido
	ON itens_pedido.id_pedido = pedidos.id
INNER JOIN sabores
	ON sabores.id = id_sabor
    group by numero_pedido, clientes.nome, clientes.telefone, motoboy.nome
";
  $stmt = $conexao->prepare($sql);
  $stmt->execute();
  $pedidos= $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pizzaria</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
        <style>
            .carousel-inner > .carousel-item > img{
                height: 673px !important;
                width: 100% !important;
            }
        </style>
    </head>
    <body>
        <nav class="navbar bg-dark">
            <div class="container">
                <a href="./index.php">
                    <img src="https://cdn-icons-png.flaticon.com/512/3595/3595458.png" alt="Logo Pizzaria" width="50">

                </a>
            </div>
        </nav>
        <div class="container"> 
        <div class="row">
            <a href="./novo_pedido.php" class="btn btn-success">Novo Pedido</a>
       </div>
        <div class="row">
            <table>
                <thead> <!-- Cabeçalho da Tabela -->
                    <th>Numero do Pedido</th>
                    <th>Nome do Cliente</th>
                    <th>Telefone</th>
                    <th>Nome do Motoboy</th>
                    <th>Quantidade de Pizzas</th>
                    <th>Valor Total do Pedido</th>
                </thead>
                <tbody> <!-- Corpo da Tabela -->
                <?php
                foreach($pedidos as $pedido){
                    print "
                    <tr> <!-- Linha -->
                    <td>".$pedido['numero_pedido']."</td> <!-- Coluna -->
                    <td>".$pedido['nome_do_cliente']."</td>
                    <td>".$pedido['telefone']."</td>
                    <td>".$pedido['nome_motoboy']."</td>
                    <td>".$pedido['quantidade_total']."</td>
                    <td>".$pedido['valor_total']."</td>
                    <td>
                    <a href='./excluir_pedidos.php?id=".$pedido['numero_pedido']."' class='btn btn-danger' onclick='return confirm(\"Você tem certeza que deseja excluir esse motoboy?\")'>Excluir<a/>
                    
                    </td>

                    </tr>";
                }

                
                ?>
                </tbody>
            </table>
         </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    
    </body>
</html>