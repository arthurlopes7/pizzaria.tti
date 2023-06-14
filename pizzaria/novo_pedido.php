<?php
    include('./conector.php');

    $sqlClientes = "SELECT * FROM clientes";
    $stmtClientes = $conexao->prepare($sqlClientes);
    $stmtClientes->execute();
    $clientes = $stmtClientes->fetchAll();

    $sqlMotoboy = "SELECT * FROM motoboy";
    $stmtMotoboy = $conexao->prepare($sqlMotoboy);
    $stmtMotoboy->execute();
    $motoboys = $stmtMotoboy->fetchALL();

    $sqlSabores = "SELECT * FROM sabores";
    $stmtSabores= $conexao->prepare($sqlSabores);
    $stmtSabores->execute();
    $sabores = $stmtSabores->fetchAll();

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
        <div class="row">
            <div class="container">
                <h1>Novo Pedido</h1>
                <form action="./salvar_pedido.php" method="POST" id="form_pedido">
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="cliente">Cliente</label>
                            <select name="cliente" id="cliente" class="form-control" onchange="preencher_endereco_telefone()" required>
                                <option value=""> - Selecione - </option>
                                <?php
                                    foreach($clientes as $cliente){
                                        print "<option value='".$cliente['id']."' endereco='".$cliente['endereco']."' telefone='".$cliente['telefone']."'   >".$cliente['nome']."</option>";
                                    }

                                ?>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" id="endereco_cliente" class="form-control" readonLy><!-- atributo readyonly, permite apenas a leitura desse campo -->
                        </div>
                        <div class="form-group col-3">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone_cliente" class="form-control" readonLy>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="motoboy">Motoboy</label>
                                <select name="motoboy" id="" class="form-control" required>
                                <option value=""> - Selecione - </option>
                                    <?php
                                        foreach($motoboys as $motoboy){
                                            print "<option value='".$motoboy['id']."'>".$motoboy['nome']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                    <hr>

                    <div class="row"> 
                        <div class="container"> 
                            <h2>Itens</h2>
                            <div class="row">
                            <div class="row col-11" id="itens"> 

                            
                                <div class="form-group col-3"> 
                                    <label for="sabor">Sabor</label>
                                    <select name="sabor" id="sabor" class="form-control" onchange="preencherValorUnitario()"required>
                                    <option value=""> - Selecione - </option>
                                        <?php
                                            foreach($sabores as $sabor){
                                                print "<option value='".$sabor['id']."'  valor_item='".$sabor['valor']."'>".$sabor['nome']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-1"> 
                                    <label for="valor">Valor Unit</label>
                                    <input type="text" name="valor" id="valor" class="form-control" readonLy>
                                </div>
                                <div class="form-group col-1">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="number" name="quantidade" onchange="multiplicarUnitarioXQuantidade()" id="quantidade" class="form-control" min="0" step="1">
                                </div>
                                <div class="form-group col-1">
                                    <label for="valor_total">Valor Total</label>
                                    <input type="text" id="valor_total" class="form-control" readonLy>
                                </div>
                            </div>
                                <div class="form-group col-1">
                                    <button class="btn btn-info" id="adicionar_item" form='#'>Adicionar Mais</button>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <button class= "btn btn-success" type="submit" form="form_pedido">Salvar</button>
                    </div>



        </form>
        </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Variavel de escopo global - Todo o JS consegue enxergar essa variavel
            var quantidade_itens = 1
            function preencher_endereco_telefone(){
                var options = document.getElementById('cliente').options
                for(var i = 0; i < options.length; i++ ){
                //console.log(options[i], 'Selecionado ?', options[i].selected)
                if(options[i].selected == true){
                    console.log(options[i].attributes.endereco.value)
                    console.log(options[i].attributes.telefone.value)

                    document.getElementById("endereco_cliente").value = options[i].attributes.endereco.value
                    document.getElementById("telefone_cliente").value = options[i].attributes.telefone.value
                }
                }
 }
            function remover_item(numero_linha){
                document.getElementById(`linha_${numero_linha}`).remove()
                quantidade_itens--
            }

            function preencherValorUnitario(numero_linha = 0){
                if(numero_linha == 0){
                    // Seleciona o elemento da página com o ID "sabor", e dentro dela pega todas as tags options existentes
                    var sabores = document.getElementById('sabor').options
                    // Percorre as opções
                    for(i = 0; i < sabores.length; i++){
                        //verifica se a opção esta selecionada (true)
                       if(sabores[i].selected == true){
                            // define o valor do campo de id "valor"
                            document.getElementById('valor').value = sabores[i].attributes.valor_item.value
                        }
                    }
                } else{
                    var sabores = document.getElementById(`sabor${numero_linha}`).options
                    // Percorre as opções
                    for(i = 0; i < sabores.length; i++){
                        //verifica se a opção esta selecionada (true)
                        if(sabores[i].selected == true){
                            // define o valor do campo de id "valor"
                            document.getElementById(`valor${numero_linha}`).value = sabores[i].attributes.valor_item.value
                        }
                    }
                }
            }    

            function multiplicarUnitarioXQuantidade(numero_linha = 0){

                if(numero_linha == 0){
                    var valor_unitario = document.getElementById('valor').value
                    var quantidade = document.getElementById('quantidade').value
                    var resultado = valor_unitario * quantidade

                    console.log("Valor unitario, ", valor_unitario)
                    console.log("Quantidade, ", quantidade)
                    console.log("Resultado, ", resultado)

                    document.getElementById('valor_total').value = resultado.toFixed(2)

                }else{

                    var valor_unitario = document.getElementById(`valor${numero_linha}`).value
                    var quantidade = document.getElementById(`quantidade${numero_linha}`).value
                    var resultado = valor_unitario * quantidade

                    console.log("Valor unitario, ", valor_unitario)
                    console.log("Quantidade, ", quantidade)
                    console.log("Resultado, ", resultado)

                    document.getElementById(`valor_total${numero_linha}`).value = resultado.toFixed(2)
                }
            }
            
            function adicionar_item(){
                var html = `<div class="row" id="linha_${quantidade_itens}">
                                <div class="form-group col-3"> 
                                    <label for="sabor${quantidade_itens}">Sabor</label>
                                    <select name="sabor${quantidade_itens}" id="sabor${quantidade_itens}"  class="form-control" onchange="preencherValorUnitario(${quantidade_itens})" required>
                                    <option value=""> - Selecione - </option>`
                                        <?php
                                            foreach($sabores as $sabor){
                                                print "+`<option value ='".$sabor['id']."'  valor_item='".$sabor['valor']."'>".$sabor['nome']."</option>`";
                                            }
                                        ?>
                                   +` </select>
                                </div>
                                <div class="form-group col-1"> 
                                    <label for="valor">Valor Unit</label>
                                    <input type="text" name="valor${quantidade_itens}" id="valor${quantidade_itens}" class="form-control" readonLy>
                                </div>
                                <div class="form-group col-1">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="number" name="quantidade${quantidade_itens}" onchange="multiplicarUnitarioXQuantidade(${quantidade_itens})" id="quantidade${quantidade_itens}" class="form-control" min="0" step="1">
                                </div>
                                <div class="form-group col-1">
                                    <label for="valor_total">Valor Total</label>
                                    <input type="text" id="valor_total${quantidade_itens}" class="form-control" readonLy>
                                </div>
                                    <div class="form-group col-1">
                                            <button class="btn btn-danger" onclick="remover_item(${quantidade_itens})" form="#">Remover</button>
                                    </div>
                                </div>
                                
                                `
                quantidade_itens++
                document.getElementById('itens').insertAdjacentHTML('beforeend', html)

            }

            document.getElementById('adicionar_item').onclick = adicionar_item
            

        </script>
    </body>
</html>
