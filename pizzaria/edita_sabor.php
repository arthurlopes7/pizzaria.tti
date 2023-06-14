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
        $sql = "UPDATE sabores SET nome = :nome, descrição = :descricao, valor = :valor WHERE id  = :id";
        $nome = $_POST['nome'];
        $descricao = $_POST['descrição'];
        $valor = $_POST['valor'];
        $id = $_POST['id'];

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':id', $id);
        try{
            $stmt->execute();
          
          } catch(PDOException $erro){
            var_dump($erro);
              header('Location: index_sabores.php?sabor_alterado=n');
              exit;
          }
          header('Location: index_sabores.php?sabor_alterado=s');
    }
    editar($conexao); // Executa a funçao