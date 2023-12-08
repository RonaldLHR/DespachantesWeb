<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/LoginDespachante.css">
	<title>Pesquisar Usuario</title>		
</head>
<body>
	<div class="div">
		
	
		<h1 style="color:black" class="efeitos2" >Busca de Usuário</h1>
		<section class="center">
		<form method="POST" action="">
		<p><img src=https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png
            title="Imagem retirada de https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png"/></p>
			
		<label class="efeitos" style="color: white">Digite o Nome de Usuário: </label>
		<input type="text" name="nome" placeholder="Digite o Usuário, EX: João Maria"><br><br>
			
		<input class="botao" name="SendPesqUser" type="submit" value="Buscar">
		
</form><br><br>
           <h1 style="color:black" class="efeitos2" >Usuários:</h1>
		<?php
		$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
		if($SendPesqUser){
			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			$result_usuario = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";
			$resultado_usuario = mysqli_query($mysqli, $result_usuario);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				echo "Nome: " . $row_usuario['nome'] . "<br>";
				echo "E-mail: " . $row_usuario['email'] . "<br>";
				echo "<a href='edit_usuario.php?codigo=" . $row_usuario['codigo'] . "'>Editar</a><br>";
				echo "<a href='proc_apagar_usuario.php?codigo=" . $row_usuario['codigo'] . "'>Apagar</a><br><hr>";

			}
		}
		?>
         		<br><br>
				<a class="botao" style="color:white" href="login.php">Voltar</a>
				<br>
				<a class="botao" style="color:white" href="logout.php">Sair</a>
				
				<br>
                <cite><p style="color: LightGrey ">©WRW Despachantes 2023</p></cite>



	     </selection>
	    </div>
    </body>
</html>