<?php
session_start();
if(!empty($_SESSION['codigo'])){
	echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
	echo "<a href='index.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: cadastrar.php");	
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/Login.css">
		<title>Iniciar</title>	
	</head>
	<body>
<div class="div">
<u><h1 style="color: white" >Página Inicial</h1></u>
<section class="center">
<p><img src=https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png
title="Imagem retirada de https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png"
/></p>



  <big> <u style="color: white"><p class="efeitos" style="color: black">Cadastrar Serviço: <a href="EntrarClientes.php" target="_blank" style="color: black">(Acessar)</a></p></u></big>
  <big><u style="color: white"><p class="efeitos" style="color: black">Buscar Usúarios pelo Nome: <a href="Pesquisar.php" target="_blank" style="color: black">(Acessar)</a></p></u></big>
  <big><u style="color: white"><p class="efeitos" style="color: black">Pesquisar Clientes pelo CPF: <a href="pesquisar2.php" target="_blank" style="color: black">(Acessar)</a></p></u></big>
  <big><u style="color: white"><p class="efeitos" style="color: black">Login: <a href="index.php" style="color: black">(Acessar)</a></p></u></big>
  <big><u style="color: white" ><p class="efeitos" style="color: black">Sair: <a href="logout.php"style="color: black">(Acessar)</a></p></u></big>
    



  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
                <cite><p style="color: LightGrey ">©WRW Despachantes 2023</p></cite>
    <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		
?>		
            </section> 
         </div>
    </body>
</html>