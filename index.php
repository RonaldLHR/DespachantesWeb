<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Login Despachante</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="CSS/LoginDespachante.css">
</head>
<body>

<div class="div">
<u><h1 style="color:black" class="efeitos2">Área de Acesso Despachante</h1></u>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
if(isset($_SESSION['msgcad'])){
	echo $_SESSION['msgcad'];
	unset($_SESSION['msgcad']);
}
?>
<section class="center">
<form method="POST" action="valida.php" enctype="multipart/form-data">
            <p><img src=https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png 
            title="Imagem retirada de https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png"/></p>

            <big><p><label class="efeitos" style="color: white" for="email">Email:</label></big>
            <input type="text" id="email" placeholder="Email:" name="email" minlength="4" maxlength="50" required></p>
                
            <big><p><label class="efeitos" style="color: white" for="senha">Senha:</label></big>
            <input type="password" id="senha" placeholder="Digite sua Senha" name="senha" minlength="8" required></p>

      
   
            <u><p style="color: black">Esqueceu a senha <a href="EsqueceuSenha.html" target="_blank" style="color: black">(Clique Aqui)</a></p></u>
			      <u><p style="color: black">Primeiro Acesso: <a href="cadastrar.php" target="_blank" style="color: black">(Clique Aqui)</a></p></u>
   
            <input class="botao" style="color:white" name="btnLogin" type="submit" value="Entrar">

                <br>
                <cite><p style="color: LightGrey ">©WRW Despachantes 2023</p></cite>
                
                </form>
        </section>
      </div>
    </body>
</html>





