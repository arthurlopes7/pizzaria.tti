<?php 
// CRUD
// CREATE -> Criar registros no banco de dados -> INSERT
// READ -> Ler os registros no banco de dados -> SELECT
// UPDATE -> Atualizar os registros no banco de dados -> UPDATE
// DELETE -> Excluir registros do banco de dados -> DELETE

    include('conector.php');

    //print "<pre";
    //print_r($_POST);

    function editar($conexao){ // Cria a função, mas não executa 
        $sql = "UPDATE motoboy SET nome = :nome, cpf = :cpf WHERE id  = :id";
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $id = $_POST['id'];

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':id', $id);
        try{
            $stmt->execute();
          
          } catch(PDOException $erro){
            var_dump($erro);
              //header('Location: index_motoboy.php?motoboy_alterado=n');
              //exit;
          }
         //header('Location: index_motoboy.php?motoboy_alterado=s');
    }
    editar($conexao); // Executa a funçao