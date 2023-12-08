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
		
	
		<h1 style="color:black" class="efeitos2" >Busca de Cliente pelo CPF</h1>
		<section class="center">
		<form method="POST" action="">
		<p><img src=https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png
            title="Imagem retirada de https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png"/></p>
			
		<label class="efeitos" style="color: white">Consultar CPF: </label>
		<input type="text" name="cpf" placeholder="Digite o CPF: (Somente Números) " maxlength="11" minlength="11" required><br><br>
			
		<input class="botao" name="SendPesqUser" type="submit" value="Buscar">
		
</form><br><br>
           <h1 style="color:black" class="efeitos2" >Clientes:</h1>
		<?php
		$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
		if($SendPesqUser){
			$cpf = $_POST['cpf'];
			$result_usuario = "SELECT * FROM clientes c JOIN (veiculos v,servicos s) on (c.cpf=v.cliente_cpf AND c.cpf=s.cliente_cpf) WHERE cpf LIKE '%$cpf%'";
			$resultado_usuario = mysqli_query($mysqli, $result_usuario);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

				echo "Nome: " . $row_usuario['nome'] . "<br>";
				echo "CPF: " . $row_usuario['cpf'] . "<br>";
                echo "RG: " . $row_usuario['rg'] . "<br>";
                echo "DataNascimento: " . $row_usuario['DataNascimento'] . "<br>";
                echo "Email: " . $row_usuario['Email'] . "<br>";
                echo "Sexo: " . $row_usuario['sexo'] . "<br>";
                echo "Estado Civil: " . $row_usuario['EstadoCivil'] . "<br>";
                echo "Telefone: " . $row_usuario['Telefone'] . "<br>";
                echo "Numero: " . $row_usuario['Numero'] . "<br>";
                echo "cep: " . $row_usuario['cep'] . "<br>";
                echo "Estado: " . $row_usuario['Estado'] . "<br>";
                echo "Cidade: " . $row_usuario['Cidade'] . "<br>";
                echo "DataAtualizacao: " . $row_usuario['DataAtualizacao'] . "<br>";
				echo "<br>Veiculo: " . $row_usuario['MarcaModelo'] . "<br>";
				echo "Placa: " . $row_usuario['Placa'] . "<br>";
				echo "Renavam: " . $row_usuario['Renavam'] . "<br>";
				echo "Cor: " . $row_usuario['Cor'] . "<br>";
				echo "Ano Modelo/Fabricação: " . $row_usuario['AnoModelo'] ." / ". $row_usuario['AnoFabricacao']. "<br>";
				echo "Categoria: ". $row_usuario['Categoria'] . "<br>";
				echo "<br>Tipo de Serviço: ". $row_usuario['Servico'] . "<br>";
				echo "Numero do Processo: ". $row_usuario['NumeroProcesso'] . "<br>";
				echo "Prazo de Entrega: ". $row_usuario['PrazoEntrega'] . "<br>";
				
                echo "<a href='edit_cpf.php?cpf=" . $row_usuario['cpf'] . "'>Editar</a><br>";
				echo "<a href='proc_apagar_cpf.php?cpf=" . $row_usuario['cpf'] . "'>Apagar</a><br>";
            
			}
		}
		?>
         		
				<p><a class="botao" href="cadastrar.php">Cadastrar</a><br><br>
		        <a class="botao" href="index.php">Listar</a><br>
	            </p>
				<br><br>
				<p><a class="botao" href="login.php">Voltar<a/></p><br>
                <cite><p style="color: LightGrey ">©WRW Despachantes 2023</p></cite>



	     </selection>
	    </div>
    </body>
</html>