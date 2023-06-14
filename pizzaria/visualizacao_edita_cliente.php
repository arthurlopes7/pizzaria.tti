<?php
include('conector.php');
if(!isset($_GET['id'])){ // Se não for passado nenhum id por parametro
    die('Não foi passado nehum id de cliente'); // Encerra o programa nessa linha imprimindo a mensagem passada no parametro
}

$sql = "SELECT * FROM clientes WHERE id = ".$_GET['id'];
$stmt = $conexao->prepare($sql);
$stmt->execute();
$cliente = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
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
        <h1>Cadastro de Clientes</h1>
        <form action="./editar_cliente.php"  method="POST">
        <input type = "hidden" name = "tipo" value = "cliente">
        <input type ="hidden" name="id" value="<?php echo $_GET['id']?>"> 
<div class= "container">
    <div class="row">
    <div class="col-6"> 
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="" class ="form-control" value = "<?php echo $cliente['nome']?>">
    </div>
    <div class="row">
    <div class="col-6">
        <label for="CPF/CNPJ">CPF/CNPJ</label>
        <input type="text" name="cpf_cnpj" id="" class="form-control" value = "<?php echo $cliente['cpf_cnpj']?>">
    </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
    <div class="col-6">
            <label for="endereço">Endereço</label>
            <input type="text" name="endereço" id="" class="form-control" value = "<?php echo $cliente['endereco']?>"> 
                <br>
                <label for= "telefone">Telefone</label>
                <input type="text" name="telefone" id="" class="form-control" value = "<?php echo $cliente['telefone']?>"> 
                    <br>
                <input type="submit" value="Voltar" class="btn btn-info">
                    <input type="submit" value="Salvar" class="btn btn-primary">

</form>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    </div>
</body>
</html>