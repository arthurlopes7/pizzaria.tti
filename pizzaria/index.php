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
        <!--div> Identação
            <div>
                <div>

                </div>
            </div>
        </div-->

        <nav class="navbar bg-dark">
            <div class="container">
                <a href="#">
                    <img src="https://cdn-icons-png.flaticon.com/512/3595/3595458.png" alt="Logo Pizzaria" width="50">

                </a>
            </div>
        </nav>
        <div class="container h-25">
            <div class="row">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2023/01/230106115455-pizza-hut-big-new-yorker.jpg" class="d-block w-100 h-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://maximasaude.com.br/wp-content/uploads/2022/06/Mussarela.jpg" class="d-block w-100 h-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://midias.agazeta.com.br/2021/07/08/pizzas-da-rede-carioca-de-delivery-forneria-original-com-loja-em-vila-velha-554300.png" class="d-block w-100 h-100 img-fluid" alt="...">
                </div>
            </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Pizzaria TTI
                    </h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 d-block">
                               <a href= "./cadastro_cliente.php" class="btn btn-lg btn-success"> Cadastro de Clientes</a>
                
                            </div>
                            <div class="col-6">
                                <a href= "./index_sabores.php" class="btn btn-lg btn-primary"> Cadastro de Produtos</a>
                            
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                        <a href= "./index_motoboy.php" class="btn btn-lg btn-danger"> Cadastro de Motoboys </a>
                       
                        </div>
                        <div class="col-6">
                            <a class="btn btn-lg btn-warning" href="./index_pedidos.php"> Pedidos </a>
                        </div>
                    </div>
                    
                </div>

            </div>

        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
       <script> 
        <?php
        if(isset($_GET['cliente_inserido']) && $_GET['cliente_inserido'] == 's'){
            ?>
        alert('Cliente inserido com sucesso!')
        <?php
        }
        ?> 
        <?php
        if(isset($_GET['cliente_inserido']) && $_GET['cliente_inserido'] == 'n'){
            ?>
        alert('Cliente não inserido!')
        <?php
        }
        ?> 
        <?php
        if(isset($_GET['motoboy_inserido']) && $_GET['motoboy_inserido'] == 's'){
            ?>
        alert('Motoboy cadastrado com sucesso!')
        <?php
        }
        ?> 
        <?php
        if(isset($_GET['motoboy_inserido']) && $_GET['motoboy_inserido'] == 'n'){
            ?>
        alert('Motoboy não cadastrado!')
        <?php
        }
        ?> 
        <?php
        if(isset($_GET['sabor_inserido']) && $_GET['sabor_inserido'] == 's'){
            ?>
        alert('Sabor adicionado com sucesso!')
        <?php
        }
        ?> 
        <?php
        if(isset($_GET['sabor_inserido']) && $_GET['sabor_inserido'] == 'n'){
            ?>
        alert('Sabor não adicionado!')
        <?php
        }
        ?> 
        </script>
    </body>
</html>