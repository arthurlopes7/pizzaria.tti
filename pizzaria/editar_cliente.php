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
        $sql = "UPDATE clientes SET nome = :nome, cpf_cnpj = :cpf_cnpj, endereco = :endereco,telefone = :telefone WHERE id  = :id";
        $nome = $_POST['nome'];
        $cpf_cnpj = $_POST['cpf_cnpj'];
        $endereco = $_POST['endereço'];
        $telefone = $_POST['telefone'];
        $id = $_POST['id'];

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':id', $id);
        try{
            $stmt->execute();
          
          } catch(PDOException $erro){
              header('Location: index_clientes.php?cliente_alterado=n');
              exit;
          }
          header('Location: index_clientes.php?cliente_alterado=s');
    }
    editar($conexao); // Executa a funçao