<?php
ini_set('display_errors',1);
include('./conector.php');
// Arquivo responsável por armazenar todas as funções de interação com o banco de dados
function cadastrarCliente($conexao){
    $sql = "INSERT INTO clientes (nome, cpf_cnpj, endereco, telefone) VALUES(:nome,:cpf_cnpj,:endereco,:telefone)";

    $nome      = $_GET['nome'];
    $cpf_cnpj  = $_GET['cpf_cnpj'];
    $rua       = $_GET['endereço'];
    $numero    = $_GET['telefone'];

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
    $stmt->bindParam(':endereco', $rua);
    $stmt->bindParam(':telefone', $numero);
try{
  $stmt->execute();

} catch(PDOException $erro){
    header('Location: index.php?cliente_inserido=n');
    exit;
}
header('Location: index.php?cliente_inserido=s');
  
}


function cadastrarMotoboy($conexao){
    $sql = "INSERT INTO motoboy (nome, cpf) VALUES (:nome,:cpf)";

    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    try{
        $stmt->execute();
    } catch(PDOException $erro){
        header('Location: index.php?motoboy_inserido=n');
        exit;
    }
    header('Location: index.php?motoboy_inserido=s');
}


function cadastrarSabor($conexao){
    $sql = "INSERT INTO sabores (nome, descrição, valor) VALUES (:nome, :descricao, :valor)";

    $nome = $_GET['nome'];
    $descrição = $_GET['descricao'];
    $valor = $_GET['valor'];
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descrição);
    $stmt->bindParam(':valor', $valor);

    try{
        $stmt->execute();
    } catch(PDOException $erro){
        header('Location: index.php?sabor_inserido=n');
        exit;
    }
    header('Location: index.php?sabor_inserido=s');

}
var_dump($_GET);
if($_GET['tipo'] == 'cliente'){
    cadastrarCliente($conexao);
}

if($_GET['tipo'] == 'sabor'){
    cadastrarSabor($conexao);
}
if($_GET['tipo'] == 'motoboy'){
    cadastrarMotoboy($conexao);
}