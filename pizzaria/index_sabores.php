<?php
include('./conector.php');

$sql = "select * from sabores";
$stmt = $conexao->query($sql);
//$clientes = $stmt->fetch();
$sabores   = $stmt->fetchAll(); //fetchAll retorna todos os registros da consulta
//print "<pre>";
//var_dump($sabores);
//exit;

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
            <a href="" class="btn btn-success">Cadastrar novo sabor</a>
       </div>
        <div class="row">
            <table>
                <thead> <!-- Cabeçalho da Tabela -->
                    <th>ID</th>
                    <th>Sabor</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Opções</th>
                </thead>
                <tbody> <!-- Corpo da Tabela -->
                <?php
                foreach($sabores as $sabor){
                    print "
                    <tr> <!-- Linha -->
                    <td>".$sabor['id']."</td> <!-- Coluna -->
                    <td>".$sabor['nome']."</td>
                    <td>".$sabor['descrição']."</td>
                    <td>".$sabor['valor']."</td>
                    <td>  
                    <a href='./visualizacao_edita_sabor.php?id=".$sabor['id']."' class='btn btn-info'>Editar</a>
                    <a href='./excluir_sabor.php?id=".$sabor['id']."' class='btn btn-danger' onclick='return confirm(\"Você tem certeza que deseja excluir esse sabor?\")'>Excluir<a/>
                    
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