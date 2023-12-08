<?php
session_start();
include_once("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($email)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_email = "SELECT codigo, nome, email, senha FROM usuarios WHERE email='$email' LIMIT 1";
		$resultado_email = mysqli_query($mysqli, $result_email);
		if($resultado_email){
			$row_email = mysqli_fetch_assoc($resultado_email);
			if(password_verify($senha, $row_email['senha'])){
				$_SESSION['codigo'] = $row_email['codigo'];
				$_SESSION['nome'] = $row_email['nome'];
				$_SESSION['email'] = $row_email['email'];
				$_SESSION['usuario'] = $row_email['usuario'];
				header("Location: login.php");
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: index.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: index.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: index.php");
}