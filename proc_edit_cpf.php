<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$DataNascimento = filter_input(INPUT_POST, 'DataNascimento', FILTER_SANITIZE_STRING);
$Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$EstadoCivil = filter_input(INPUT_POST, 'EstadoCivil', FILTER_SANITIZE_STRING);
$Telefone = filter_input(INPUT_POST, 'Telefone', FILTER_SANITIZE_STRING);
$Logradouro = filter_input(INPUT_POST, 'Logradouro', FILTER_SANITIZE_STRING);
$Numero = filter_input(INPUT_POST, 'Numero', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$Estado = filter_input(INPUT_POST, 'Estado', FILTER_SANITIZE_STRING);
$Cidade = filter_input(INPUT_POST, 'Cidade', FILTER_SANITIZE_STRING);
$DataAtualizacao = filter_input(INPUT_POST, 'DataAtualizacao', FILTER_SANITIZE_STRING);


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE clientes SET nome='$nome', cpf='$cpf', rg='$rg', DataNascimento='$DataNascimento', 
Email='$Email', sexo='$sexo', EstadoCivil='$EstadoCivil', Telefone='$Telefone', Logradouro='$Logradouro', 
Numero='$Numero', cep='$cep'  Estado='$Estado', Cidade='$Cidade', DataAtualizacao='$DataAtualizacao', modified=NOW() WHERE cpf='$cpf'";
$resultado_usuario = mysqli_query($mysqli, $result_usuario);

if(mysqli_affected_rows($mysqli)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: editar.php?cpf=$cpf");
}
