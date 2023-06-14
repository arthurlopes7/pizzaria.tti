<?php
include('./conector.php');

$sql = "select * from motoboy";
$stmt = $conexao->query($sql);
//$clientes = $stmt->fetch();
$motoboys   = $stmt->fetchAll(); //fetchAll retorna todos os registros da consulta
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
            <a href="" class="btn btn-success">Cadastrar Motoboy</a>
       </div>
        <div class="row">
            <table>
                <thead> <!-- Cabeçalho da Tabela -->
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                </thead>
                <tbody> <!-- Corpo da Tabela -->
                <?php
                foreach($motoboys as $motoboy){
                    print "
                    <tr> <!-- Linha -->
                    <td>".$motoboy['id']."</td> <!-- Coluna -->
                    <td>".$motoboy['nome']."</td>
                    <td>".$motoboy['cpf']."</td>
                    <td>  
                    <a href='./visualiza_edita_motoboy.php?id=".$motoboy['id']."' class='btn btn-info'>Editar</a>
                    <a href='./excluir_motoboy.php?id=".$motoboy['id']."' class='btn btn-danger' onclick='return confirm(\"Você tem certeza que deseja excluir esse motoboy?\")'>Excluir<a/>
                    
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