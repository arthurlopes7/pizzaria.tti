<?php 
//Try -> tentar executar , caso dê erro o catch é executado

try {
//"mysql:host=localhost;dbname=exercicio" -> Definição de parametros da sua conexão com o banco de dados
// driver:host=servidor_do_banco_de_Dados;dbname=nome_do_banco_de_dados

$conexao = new PDO("mysql:host=localhost;dbname=pizzaria","root","");
} catch(PDOException $erro){
    print "Erro ao conectar no banco de dados. Erro ".$erro->getMessage();
}