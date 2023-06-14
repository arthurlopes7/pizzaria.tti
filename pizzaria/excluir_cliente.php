<?php
    include ('conector.php');

    function excluir($conexao){

        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);

        try{
            $stmt->execute();
          
          } catch(PDOException $erro){
              header('Location: index_clientes.php?cliente_excluido=n');
              exit;
          }
          header('Location: index_clientes.php?cliente_excluido=s');
            
          }


    excluir($conexao);