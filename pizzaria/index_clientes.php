<?php
include('./conector.php');

$sql = "select * from clientes";
$stmt = $conexao->query($sql);
//$clientes = $stmt->fetch();
$clientes   = $stmt->fetchAll(); //fetchAll retorna todos os registros da consulta
//print "<pre>";
//var_dump($clientes);
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
            <a href="./cadastro_cliente.php" class="btn btn-success">Cadastrar Cliente</a>
       </div>
        <div class="row">
            <table>
                <thead> <!-- Cabeçalho da Tabela -->
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Opções</th>
                </thead>
                <tbody> <!-- Corpo da Tabela -->
                <?php
                foreach($clientes as $cliente){
                    print "
                    <tr> <!-- Linha -->
                    <td>".$cliente['id']."</td> <!-- Coluna -->
                    <td>".$cliente['nome']."</td>
                    <td>".$cliente['cpf_cnpj']."</td>
                    <td>".$cliente['endereco']."</td>
                    <td>".$cliente['telefone']."</td>
                    <td> 
                        <a href='./visualizacao_edita_cliente.php?id=".$cliente['id']."' class='btn btn-info'>Editar</a>
                        <a href='./excluir_cliente.php?id=".$cliente['id']."' class='btn btn-danger' onclick='return confirm(\"Você tem certeza que deseja excluir?\")'>Excluir<a/>
                    
                    </td>

                    </tr>";
                }
                ?>
                </tbody>
            </table>
         </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
        <script>
        <?php
        if(isset($_GET['cliente_alterado']) && $_GET['cliente_alterado'] == 'n'){
        ?>
            alert('Erro ao alternar cliente!')
        <?php
            }
        ?>
        <?php
        if(isset($_GET['cliente_alterado']) && $_GET['cliente_alterado'] == 's'){
        ?>
            alert('Cliente alterado com sucesso!')
        <?php
            }
        ?>
        <?php
        if(isset($_GET['cliente_excluido']) && $_GET['cliente_excluido'] == 'n'){
        ?>
            alert('Erro ao excluir cliente!')
        <?php
            }
        ?>
        <?php
        if(isset($_GET['cliente_excluido']) && $_GET['cliente_excluido'] == 's'){
        ?>
            alert('Cliente excluido com sucesso!')
        <?php
            }
        ?>
        </script>

    </body>
</html>