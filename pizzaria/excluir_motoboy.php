<?php
    include ('conector.php');

    function excluir($conexao){

        $sql = "DELETE FROM motoboy WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);

        try{
            $stmt->execute();
          
          } catch(PDOException $erro){
              header('Location: index_motoboy.php?motoboy_excluido=n');
              exit;
          }
          header('Location: index_motoboy.php?motoboy_excluido=s');
            
          }


    excluir($conexao);