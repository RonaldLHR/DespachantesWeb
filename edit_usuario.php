<?php
session_start();
include_once("conexao.php");
$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE codigo = '$codigo'";
$resultado_usuario = mysqli_query($mysqli, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/LoginDespachante.css">
	<title>Editar Usuário</title>		
</head>
<body>
<div class="div">
	<h1 style="color:black" class="efeitos2" >Editar Usuário</h1>
	<?php
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
?>
		<form method="POST" action="proc_edit_usuario.php">
		<p><img src=https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png
            title="Imagem retirada de https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png/"/></p>
			<input type="hidden" name="codigo" value="<?php echo $row_usuario['codigo']; ?>">
			
			<label class="efeitos" style="color: black">Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label class="efeitos" style="color: black">E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>