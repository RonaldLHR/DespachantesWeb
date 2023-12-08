<?php
if ($_POST) {
	include 'conexao.php';
	$senha = $_POST['senha'];
	$valNome=0;
	$senhaMi=strtolower($senha);
	$nome = strtolower($_POST["nome"]);
	$tamN=strlen($nome);	
	$tamS = strlen($senha);
	$letraMa = 0;
	$letraMi = 0;
	$numTotal = 0;
	//echo "$tam";
	$maiusculo = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
	$minusculo = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "W", "x", "y", "z");
	$numero = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "!", "#", "$", "%", "&", "(", ")", "*", "+", ",", "-", ".", "/", ":", ";", "<", "=", ">", "?", "@", "[", "]", "^", "{", "|", "}", ")");

	
	for ($i = 0; $i < $tamS; $i++) {
		for ($f = 0; $f < 26; $f++) {
			if ($senha[$i] == $maiusculo[$f]) {
				$letraMa++;
			}
			if ($senha[$i] == $minusculo[$f]) {
				$letraMi++;
			}
		}
		for ($k = 0; $k < 37; $k++) {
			if ($senha[$i] == $numero[$k]) {
				$numTotal++;
			}
		}
		for($cont=0;$cont<$tamN;$cont++){
			if($nome[$cont]== $senhaMi[$i] && $nome!=" " && $i<=$tamS-3){
				if($nome[$cont+1]==$senhaMi[$i+1]){
					if($nome[$cont+2]==$senhaMi[$i+2]){
						if($nome[$cont+3]==$senhaMi[$i+3] && $nome!=" "){
							$valNome++;
						}
					}	
				}
			}		
		}
	}
	$soma = $letraMa + $letraMi + $numTotal;
	if ($letraMa >= 1 && $letraMi >= 1 && $numTotal >= 1 && $tamS >= 8 && $soma == $tamS && $valNome==0) {
		session_start();
		ob_start();
		$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
		//if ($btnCadUsuario) {
			$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			$erro = false;

			$dados_st = array_map('strip_tags', $dados_rc);
			$dados = array_map('trim', $dados_st);
/*
			if (in_array('', $dados)) {
				$erro = true;
				$_SESSION['msg'] = "Necessário preencher todos os campos";
			} elseif ((strlen($dados['senha'])) < 8) {
				$erro = true;
				$_SESSION['msg'] = "A senha deve ter no minímo 8 caracteres";
			} elseif (stristr($dados['senha'], "'")) {
				$erro = true;
				$_SESSION['msg'] = "Caracter ( ' ) utilizado na senha é inválido";
			} else {
				$result_usuario = "SELECT codigo FROM usuarios WHERE usuario='" . $dados['usuario'] . "'";
				$resultado_usuario = mysqli_query($mysqli, $result_usuario);
				if (($resultado_usuario) and ($resultado_usuario->num_rows != 0)) {
					$erro = true;
					$_SESSION['msg'] = "Este usuário já está sendo utilizado";
				}

				$result_usuario = "SELECT codigo FROM usuarios WHERE email='" . $dados['email'] . "'";
				$resultado_usuario = mysqli_query($mysqli, $result_usuario);
				if (($resultado_usuario) and ($resultado_usuario->num_rows != 0)) {
					$erro = true;
					$_SESSION['msg'] = "Este e-mail já está cadastrado";
				}
			}
*/

			//var_dump($dados);
			//if (!$erro) {
				//var_dump($dados);
				$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

				$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
						'" . $dados['nome'] . "',
						'" . $dados['email'] . "',
						'" . $dados['usuario'] . "',
						'" . $dados['senha'] . "'
						)";
				$resultado_usuario = mysqli_query($mysqli, $result_usuario);
				if (mysqli_insert_id($mysqli)) {
					$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
					header("Location: index.php");
				} else {
					$_SESSION['msg'] = "Erro ao cadastrar o usuário";
				}
			//}
		//}
	} else {
		echo  "<script>alert('SENHA INVÁLIDA!!!');</script>";
	}
	$mysqli->close();
}
////////////////////////////////

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title>Cadastro de Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="CSS/LoginDespachante.css">
</head>

<body>
	<div class="div">

		<h2 style="color:black" class="efeitos2">Cadastro de Login</h2>
		<?php
		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<section class="center">
			<form method="POST" action="">
				<p><img src=https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png title="Imagem retirada de http://www.pr.gov.br/logos/assinatura_expresso/2019/" /></p>

				<big>
					<p><label class="efeitos" style="color: white">Nome</label>
				</big>
				<input type="text" name="nome" placeholder="Digite o nome e o sobrenome" required></p>

				<big>
					<p><label class="efeitos" style="color: white">E-mail</label>
				</big>
				<input type="text" name="email" placeholder="Digite o seu e-mail" required></p>

				<big>
					<p><label class="efeitos" style="color: white">Usuário</label>
				</big>
				<input type="text" name="usuario" placeholder="Digite o usuário" required></p>

				<big>
					<p><label class="efeitos" style="color: white">Senha</label>
				</big>
				<input type="password" name="senha" placeholder="Digite a senha" required></p>

				<input class="botao" style="color:white" type="submit" name="btnCadUsuario" value="Cadastrar" ><br><br>

				Lembrou? <a href="index.php">Clique aqui</a> para logar

				<br>
				<cite>
					<p style="color: LightGrey ">©WRW Despachantes 2023 </p>
				</cite>


		</section>
	</div>
	</form>
</body>

</html>