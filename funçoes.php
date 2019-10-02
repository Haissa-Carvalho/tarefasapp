<?php
 function criarConexao()
 {
 	$banco="tarefa";
 	$usuario="tarefa";
 	$senha="senha123";
 	$conexao = new PDO("mysql:host=localhost;dbname=${banco}",
 		$uusuario, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") )	;
	return $conexao;
 }


function buscarTarefa()
{
	$conexao = criarConexao();
	$sql = "SELECT * FROM tarefa";
	$comando = $conexao->query($sql);
	return $comando->fetchAll();
}


function criarTarefa ($nome)
{
	$conexao = criarConexao();
	$sql = "INSERT INTO tarefa values ( ?, ?, ?, null)";
	$comando = $conexao->prepare($sql);
	return $comando->execute(
		[
			$nome
		]
	);
}


function excluir($id)
{
	$conexao = criarConexao();
	$sql = "delete from tarefa where Codigo=?";
	$comando = $conexao->prepare($sql);
	return $comando->execute(
		[
		
			$id
		]
	);
}
function concluir($id)
{
	$conexao = criarConexao();
	$sql = "update contador set Concluido = 's' where Codigo=?";
	$comando = $conexao->prepare($sql);
	return $comando->execute(
		[
		
			$id
		]
	);
}
?>