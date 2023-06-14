<?php 

    include("conector.php");

    //print "<pre>";
    //print_r($_POST);


    $id_cliente = $_POST['cliente'];
    $id_motoboy = $_POST['motoboy'];

    $sql_ultimo_pedido  = "SELECT COALESCE (MAX(numero_pedido),0)+1 AS NOVO_NUMERO_PEDIDO FROM pedidos";
    $stmt1 = $conexao->prepare($sql_ultimo_pedido);
    $stmt1->execute();
    $dsUltimoPedido = $stmt1->fetch();

    print "<pre>";
    print_r($dsUltimoPedido);

    $numeroPedido = $dsUltimoPedido['NOVO_NUMERO_PEDIDO'];

    $insertCabecalho = "INSERT INTO pedidos (numero_pedido, id_cliente, id_motoboy) VALUES (:numero_pedido, :id_cliente, :id_motoboy)";

    $stmt2 = $conexao->prepare($insertCabecalho);
    $stmt2->bindParam(':numero_pedido', $numeroPedido);
    $stmt2->bindParam(':id_cliente', $id_cliente);
    $stmt2->bindParam(':id_motoboy', $id_motoboy);
    $stmt2->execute();

    $sabores = [];
    $quantidades = [];
    $valores = [];

    foreach($_POST as $chave => $valor){

        if(str_starts_with($chave, 'sabor')){
            array_push($sabores, $valor);
        }

        if(str_starts_with($chave, 'quantidade')){
            array_push($quantidades, $valor);
        }

        if(str_starts_with($chave, 'valor')){
            array_push($valores, $valor);
        }



    }
    print_r($valores);

    foreach($sabores as $chave => $id_sabor){

        $quantidade = $quantidades[$chave];
        $valor = $valores[$chave];
        $insert = " INSERT INTO itens_pedido(id_pedido, id_sabor, quantidade, valor) values(:id_pedido, :id_sabor, :quantidade, :valor)";
        $stmt3 = $conexao->prepare($insert);
        $stmt3->bindParam(":id_pedido", $numeroPedido);
        $stmt3->bindParam(":id_sabor", $id_sabor);
        $stmt3->bindParam(":quantidade", $quantidade);
        $stmt3->bindParam(":valor", $valor);
        $stmt3->execute();
    }
    header("Location: index_pedidos.php");