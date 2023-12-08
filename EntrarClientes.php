<?php
session_start();
?> 
<?php
if($_POST){
    include 'conexao.php';
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $DataNascimento = $_POST['DataNascimento'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $EstadoCivil = $_POST['EstadoCivil'];
    $Telefone = $_POST['Telefone'];
    $Logradouro = $_POST['Logradouro'];
    $Numero = $_POST['Numero'];
    $cep = $_POST['cep'];
    $Estado = $_POST['Estado'];
    $Cidade = $_POST['Cidade'];
    $DataAtualizacao = $_POST['DataAtualizacao'];
    $inseredados = $mysqli->query("INSERT INTO Clientes (nome, cpf, rg, 
    DataNascimento, email, sexo, EstadoCivil, Telefone, Logradouro, Numero, cep, Estado, Cidade, DataAtualizacao) 
    VALUES ('$nome', '$cpf', '$rg', '$DataNascimento', '$email', '$sexo', '$EstadoCivil', '$Telefone', '$Logradouro', '$Numero', '$cep', '$Estado', '$Cidade', '$DataAtualizacao' )") or die("nao foi inserido".$mysqli->error);
    if($inseredados){
        header('location:CadastroServico.php');
    }else{
        header('location:index.php');
    }
    $mysqli->close();       
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Cadastro de Cliente</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="CSS/EntrarCliente.css">
</head>
<body>

<div class="div">
<u><h1 style="color:black" class="efeitos2">CADASTRO DE CLIENTES</h1></u>
<section class="center">

<form method="POST" action="EntrarClientes.php" enctype="multipart/form-data">
<p><img src=http://www.pr.gov.br/logos/assinatura_expresso/2019/logo-v-detran-400x200.jpg
title="Imagem retirada de http://www.pr.gov.br/logos/assinatura_expresso/2019/"
/></p>


    <p><label style="color: white" class="efeitos"  for="nome">Nome:</label>
    <input type="nome" class="form-control" id="nome" placeholder="Nome Completo, Ex: Joao Maria" name="nome" pattern="[A-Z][a-z].* [A-Z][a-z].*" required></p>



    <p><label style="color: white" class="efeitos"  for="cpf">CPF:</label>
    <input type="text" id="cpf" placeholder="Insira seu CPF" name="cpf" pattern="[0-9]{11}" required></p>


   
    <p><label  style="color: white" class="efeitos" for="rg">RG: </label>
    <input type="text" name="rg" id="rg" placeholder="RG (somente números)" pattern="[0-9]{5,}" maxlength="11" minlength="5" required></p>



    <p><label class="efeitos"  style="color: white" for="DataNascimento">Data de Nascimento:</label>
    <input type="date" name="DataNascimento" id="DataNascimento" min="1900-01-01" required></p>



    <p><label class="efeitos"  style="color: white" for="email">E-mail:</label><br>
    <input type="email" name="email" id="email" placeholder="Exemplo01@gmail.com"required></p>

    <p><label class="efeitos"  style="color: white" for="sexo">Gênero: </label><br>

    <p>
    <input class="form-check-input" type="radio" name="sexo" value="Masculino" id="radio-sexo-masculino">
    <label style="color: black"   class="form-check-label" for="radio-sexo-masculino">Masculino</label>
    </p>


    <p>
    <input class="form-check-input" type="radio" name="sexo" value="Feminino" id="radio-sexo-feminino">
    <label style="color: black"  class="form-check-label" for="radio-sexo-feminino">Feminino</label>
    </p>

    <p>
        <input class="form-check-input" type="radio" name="sexo" value="Outros" id="radio-sexo-Outros">
        <label style="color: black"  class="form-check-label" for="radio-sexo-Outros">Outros</label>
        </p>
    
    
        <p>
        <input class="form-check-input" type="radio" name="sexo" value="Prefiro Não Responder" id="radio-sexo-Prefiro Não Responder">
        <label style="color: black"   class="form-check-label" for="radio-sexo-Prefiro Não Responder">Prefiro Não Responder</label>
        </p>
         
     <br>
    <p><label class="efeitos"  style="color: white" for="EstadoCivil">Estado Civil: </label><br>


    <p>
    <input class="form-check-input" type="radio" name="EstadoCivil" value="Solteiro" id="radio-Solteiro">
    <label style="color: black" class="form-check-label" for="radio-EstadoCivil-Solteiro">Solteiro</label>
    </p>    


    <p>
    <input class="form-check-input" type="radio" name="EstadoCivil" value="Casado" id="radio-Casado">
    <label style="color: black" class="form-check-label" for="radio-EstadoCivil-Casado">Casado</label>
    </p>


    <p>
    <input class="form-check-input" type="radio" name="EstadoCivil" value="Divorciado" id="radio-Divorciado"">
    <label style="color: black"  class="form-check-label" for="radio-EstadoCivil-Divorciado">Divorciado</label>
    </p>


    <p>
    <input class="form-check-input" type="radio" name="EstadoCivil" value="Viuvo" id="radio-Viuvo">
    <label style="color: black" class="form-check-label" for="radio-EstadoCivil-Viuvo">Viúvo(a)</label>
    </p>

        



    <p><label class="efeitos" style="color: white" for="Telefone">Telefone: </label>
    <input type="text"  name="Telefone" id="Telefone" placeholder="Telefone (somente números com DDD)" pattern="[0-9]({2})[0-9]{4,}-[0-9]{4}" required></p>
  


    <p><label class="efeitos"  style="color: white" for="Logradouro">Logradouro:</label>
    <input type="text" name="Logradouro" id="Logradouro" placeholder="Logradouro" minlength="5" required></p>


           
    <p><label class="efeitos"  style="color: white" for="Numero">Número:</label>
    <input type="number" name="Numero" id="Numero" placeholder="Número" min="0" minlength="0" required ></p>
  


    <p><label class="efeitos"  style="color: white" for="cep">CEP:</label>
    <input type="text" name="cep" id="cep" placeholder="CEP (somente números)" pattern="[0-9]{8}" minlength="8" maxlength="8" required></p>

    <p class="efeitos" style="color: white"><label for="Estado">Estado: </label>
        <select style="color:black" name="Estado" required>
                    <option>AC</option>
                    <option>AL</option>
                    <option>AP</option>
                    <option>AM</option>
                    <option>BA</option>
                    <option>CE</option>
                    <option>DF</option>
                    <option>ES</option>
                    <option>GO</option>
                    <option>MA</option>
                    <option>MT</option>
                    <option>MS</option>
                    <option>MG</option>
                    <option>PA</option>
                    <option>PB</option>
                    <option selected>PR</option>
                    <option>PE</option>
                    <option>PI</option>
                    <option>RJ</option>
                    <option>RN</option>
                    <option>RS</option>
                    <option>RO</option>
                    <option>RR</option>
                    <option>SC</option>
                    <option>SP</option>
                    <option>SE</option>
                    <option>TO</option>
        </select></p>   




    <p><label class="efeitos" style="color:white" for="Cidade">Cidade: </label>
    <input type="text" name="Cidade" id="Cidade" placeholder="Cidade" minlength="3" required></p>



    <p><label class="efeitos"  style="color: white" for="DataAtualizacao">Data de Atualização do Cadastro:</label>
    <input type="date" name="DataAtualizacao" id="DataAtualizacao" min="1900-01-01" required></p>



    <div class="form-group">
    <input class="botao" style="color:white" type="submit" value="Proximo">
    <input class="botao" style="color:white" type="reset" value="Limpar">
    <h2 class="botao" style="color:white"><a href="logout.php">Sair<a/></h2> 
    
    <br>
    <cite><p style="color: LightGrey ">©LGR Despachantes 2021</p></cite>

             </form>
        </section>
      </div>
    </body>
</html>