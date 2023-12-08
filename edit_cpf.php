<?php
session_start();
include_once("conexao.php");
$cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM clientes WHERE cpf = '$cpf'";
$resultado_usuario = mysqli_query($mysqli, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/LoginDespachante.css">
	<title>Editar por CPF</title>		
</head>
<body>
<div class="div">
		<h1 style="color:black" class="efeitos2" >Editar por CPF</h1>
	    <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
        <form method="POST" action="proc_edit_usuario.php">
		<p><img src=https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png
            title="Imagem retirada de https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png"/></p>
			
			<input type="hidden" name="cpf" value="<?php echo $row_usuario['cpf']; ?>">
			
			<label class="efeitos" style="color: black" >Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label class="efeitos" style="color: black" >CPF: </label>
			<input type="text" name="cpf" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['cpf']; ?>"><br><br>

            <label class="efeitos" style="color: black">RG: </label>
			<input type="text" name="rg" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['rg']; ?>"><br><br>

            <label class="efeitos" style="color: black">Data Nascimento </label>
			<input type="text" name="DataNascimento" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['DataNascimento']; ?>"><br><br>

            <label class="efeitos" style="color: black">E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['Email']; ?>"><br><br>

            <label class="efeitos" style="color: black">sexo: </label>
			<input type="text" name="Sexo" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['sexo']; ?>"><br><br>

            <label class="efeitos" style="color: black">EstadoCivil: </label>
			<input type="text" name="EstadoCivil" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['EstadoCivil']; ?>"><br><br>

            <label class="efeitos" style="color: black">Telefone: </label>
			<input type="text" name="Telefone" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['Telefone']; ?>"><br><br>

            <label class="efeitos" style="color: black">Logradouro: </label>
			<input type="text" name="Logradouro" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['Logradouro']; ?>"><br><br>

            <label class="efeitos" style="color: black">Numero: </label>
			<input type="text" name="Numero" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['Numero']; ?>"><br><br>

            <label class="efeitos" style="color: black">cep: </label>
			<input type="text" name="cep" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['cep']; ?>"><br><br>

            <label class="efeitos" style="color: black">Estado: </label>
			<input type="text" name="Estado" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['Estado']; ?>"><br><br>

            <label class="efeitos" style="color: black">Cidade: </label>
			<input type="text" name="Cidade" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['Cidade']; ?>"><br><br>

            <label class="efeitos" style="color: black">Data Atualizacao: </label>
			<input type="text" name="DataAtualizacao" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['DataAtualizacao']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>