<?php
session_start();
if($_POST){
    include 'conexao.php';
    $Renavam = $_POST['Renavam'];
    $Chassi = $_POST['Chassi'];
    $Placa = $_POST['Placa'];
    $MarcaModelo = $_POST['MarcaModelo'];
    $MunicipioEmplacado = $_POST['MunicipioEmplacado'];
    $Estado = $_POST['Estado'];
    $AnoFabricacao = $_POST['AnoFabricacao'];
    $AnoModelo = $_POST['AnoModelo'];
    $Cor = $_POST['Cor'];
    $Combustivel = $_POST['Combustivel'];
    $Categoria = $_POST['Categoria'];
    $query="SELECT * FROM clientes";
    $result = mysqli_query($mysqli, $query);
    if($result){
        if($row = mysqli_fetch_assoc($result)){
            $cpf= $row['cpf'];
        }
    }

    

    $inseredados = $mysqli->query("INSERT INTO Veiculos (cliente_cpf,Renavam, Chassi, Placa, MarcaModelo, 
    MunicipioEmplacado, Estado, AnoFabricacao, AnoModelo, Cor, Combustivel, Categoria) 
    VALUES ('$cpf','$Renavam', '$Chassi', '$Placa', '$MarcaModelo', 
    '$MunicipioEmplacado', '$Estado', '$AnoFabricacao', '$AnoModelo', '$Cor', '$Combustivel', '$Categoria')") or die("nao foi inserido".$mysqli->error);
    if($inseredados){
        header('location:PaginaSucesso.html');
    }else{
        header('location:index.php');
    }
    $mysqli->close();       
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/CadastroVeiculos.css">
    <title>Veículos</title>
</head>
<body>
    <section>
        <legend><u><b class="legend" style="color: black" >CADASTRO DE VEÍCULOS</b></u></legend>
        <fieldset>
            <p><img src=http://www.pr.gov.br/logos/assinatura_expresso/2019/logo-v-detran-400x200.jpg
                title="Imagem retirada de http://www.pr.gov.br/logos/assinatura_expresso/2019/"
            /></p>
       
            <form method="POST" action="Veiculos.php">
                <big><label for="Renavam">Renavam:</label></big>
                <input type="text" id="Renavam" name="Renavam"  placeholder='Somente Números' pattern="[0-9]{11}" maxlength="11" required>
                
                <big><label for="Chassi">Chassi:</label></big>
                <input type="text" id="Chassi" name="Chassi" placeholder='Nº Chassi' minlength="17" maxlength="17" required>
                
                <big><label for="Placa">Placa:</label></big>
                <input type="text" id="Placa" name="Placa" placeholder='ABC1234' minlength="7" maxlength="7" required>
                
                <big><label for="MarcaModelo">Marca/Modelo:</label></big>
                <input type="text" id="MarcaModelo" name="MarcaModelo" placeholder='Marca/Modelo' minlength="2" maxlength="40" required>
                
                <big><p><label for="MunicipioEmplacado">Municipio Emplacado:</label></big>
                    <input type="text" id="MunicipioEmplacado" name="MunicipioEmplacado" placeholder=' Municipio Emplacado' minlength="2" maxlength="199" required>
                    
                    <big><label for="Estado">UF</label></big>
                    <select class="botao" name="Estado" required>
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
                    </select>
                    
                    <big><label for="AnoFabricacao">Ano Fabricação: </label></big>
                    <select class="botao"  name="AnoFabricacao" required>
                        <option>Anterior a 1970</option>
                        <option>1970</option>
                        <option>1971</option>
                        <option>1972</option>
                        <option>1973</option>
                        <option>1974</option>
                        <option>1975</option>
                        <option>1976</option>
                        <option>1977</option>
                        <option>1978</option>
                        <option>1979</option>
                        <option>1980</option>
                        <option>1981</option>
                        <option>1982</option>
                        <option>1983</option>
                        <option>1984</option>
                        <option>1985</option>
                        <option>1986</option>
                        <option>1987</option>
                        <option>1988</option>
                        <option>1989</option>
                        <option>1990</option>
                        <option>1991</option>
                        <option>1992</option>
                        <option>1993</option>
                        <option>1994</option>
                        <option>1995</option>
                        <option>1996</option>
                        <option>1997</option>
                        <option>1998</option>
                        <option>1999</option>
                        <option>2000</option>
                        <option>2001</option>
                        <option>2002</option>
                        <option>2003</option>
                        <option>2004</option>
                        <option>2005</option>
                        <option>2006</option>
                        <option>2007</option>
                        <option>2008</option>
                        <option>2009</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                        <option selected>2021</option>
                        <option>2022</option>
                    </select>

                    <big><label for="AnoModelo">AnoModelo: </label></big>
                    <select class="botao" name="AnoModelo" required>
                        <option>Anterior a 1970</option>
                        <option>1970</option>
                        <option>1971</option>
                        <option>1972</option>
                        <option>1973</option>
                        <option>1974</option>
                        <option>1975</option>
                        <option>1976</option>
                        <option>1977</option>
                        <option>1978</option>
                        <option>1979</option>
                        <option>1980</option>
                        <option>1981</option>
                        <option>1982</option>
                        <option>1983</option>
                        <option>1984</option>
                        <option>1985</option>
                        <option>1986</option>
                        <option>1987</option>
                        <option>1988</option>
                        <option>1989</option>
                        <option>1990</option>
                        <option>1991</option>
                        <option>1992</option>
                        <option>1993</option>
                        <option>1994</option>
                        <option>1995</option>
                        <option>1996</option>
                        <option>1997</option>
                        <option>1998</option>
                        <option>1999</option>
                        <option>2000</option>
                        <option>2001</option>
                        <option>2002</option>
                        <option>2003</option>
                        <option>2004</option>
                        <option>2005</option>
                        <option>2006</option>
                        <option>2007</option>
                        <option>2008</option>
                        <option>2009</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                        <option>2021</option>
                        <option selected>2022</option>
                    </select></P>

                    <big><label for="Cor">Cor: </label></big>
                    <select class="botao" name="Cor" required>
                        <option selected>BRANCA</option>
                        <option>PRETA</option>
                        <option>CINZA</option>
                        <option>PRATA</option>
                        <option>AMARELA</option>
                        <option>AZUL</option>
                        <option>MARROM</option>
                        <option>VERDE</option>
                        <option>VERMELHA</option>
                        <option>OUTRA</option>
                    </select>
                    
                    
                    <big><label for="Combustivel:">Combustível: </label></big>
                    <select class="botao" name="Combustivel" required>
                        <option>Alcool</option>
                        <option selected>Gasolina</option>
                        <option>Alcool/Gasolina</option>
                        <option>Alcool/Gas N Veicular</option>
                        <option>Diesel</option>
                        <option>Diesel/Gas N Veicular</option>
                        <option>Gasol/Alc/Gas N Veicular</option>
                        <option>Gasol/Gas N Veicular</option>
                        <option>Gas Natural Veicular</option>
                    </select>
                    
                
                    <p><big><label for="Categoria">Categoria:</label></big>

                    <big>
                    <input class="form-check-input" type="radio" name="Categoria" value="Particular" id="radio-Categoria-Particular" checked>
                    <label class="form-check-label" for="radio-Categoria-Particular">Particular</label>
                    </big>

                    <big>
                    <input class="form-check-input" type="radio" name="Categoria" value="Aluguel" id="radio-Categoria-Aluguel" >
                    <label class="form-check-label" for="radio-Categoria-Aluguel">Aluguel</label>
                    </big>

                    <big>
                    <input class="form-check-input" type="radio" name="Categoria" value="Oficial" id="radio-Categoria-Oficial">
                    <label class="form-check-label" for="radio-Categoria-Oficial">Oficial</label>
                    </big>
    
                <br>

                <input style="color: white" class="enviar" class="botao" type="submit" value="Cadastrar">
                <input style="color: white" class="enviar" class="botao" type="reset" value="Limpar">
                <h2 class="botao" style="color:white"><a href="logout.php">Sair<a/></h2> 

                <br>
                <cite><p style="color: LightGrey ">©LGR Despachantes 2021</p></cite>
             
          
            </form>
        </fieldset>
    </section>
  </body>
</html>