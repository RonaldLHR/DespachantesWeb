<?php
session_start();
?> 
<?php
if($_POST){
    include 'conexao.php';
    $Servico = $_POST['Servico'];
    $NumeroProcesso = $_POST['NumeroProcesso'];
    $PrazoEntrega = $_POST['PrazoEntrega'];
    $query="SELECT * FROM clientes";
    $result = mysqli_query($mysqli, $query);
    if($result){
        if($row = mysqli_fetch_assoc($result)){
            $cpf= $row['cpf'];
        }
    }

    $inseredados = $mysqli->query("INSERT INTO Servicos (cliente_cpf,Servico, NumeroProcesso, PrazoEntrega) 
    VALUES ('$cpf','$Servico', '$NumeroProcesso', '$PrazoEntrega')") or die("nao foi inserido".$mysqli->error);
    if($inseredados){
        header('location:Veiculos.php');
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
    <link rel="stylesheet" href="CSS/CadastroServico.css">
    <title>Serviço</title>
</head>
<body>
    <section>
        <legend><u><b class="legend" style="color: black" >ESCOLHER O TIPO DE SERVIÇO</b></u></legend>
        <fieldset>
            <p><img src=https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png
                title="Imagem retirada de https://7d1a502999570f38.cdn.gocache.net/leiloes/000000-6500c62dc264f.png"
            /></p>
            <form method="POST" action="CadastroServico.php">
                
                <big><p><label for="Servico"> Selecione o Serviço:</label></big>
                    <select class="botao" name="Servico" required>
                        <option >S01 - Primeiro Emplacamento</option>
                        <option selected>S02 - Aquisição de Veículo</option>
                        <option>S03 - Aquisição com Troca de Municipio</option>
                        <option>S04 - Emissão de 2° Via de Recibos</option>
                        <option>S05 - Alteração de Dados</option>
                        <option>S06 - Mudança de Municipio</option>
                        <option>S07 - Registro de Outro Estado </option>
                        <option>S08 - Registro de Outro Estado com Aquisiçao de Veículo </option>
                        <option>S09 - Pagamento de Débitos</option>
                        <option>S10 - Comunicação de Venda</option>
                        <option>S11 - Cancelamento da Comunicação de Venda</option>
                        <option>S12 - Baixa de Veículo</option>
                    </select></p>
                    
                    <big><p><label for="NumeroProcesso">Criar um número de processo: </label></big>
                    <input type="text" placeholder='Somente Numeros, Ex: 0723' id="NumeroProcesso"  name= 'NumeroProcesso'  class="efeitos" pattern="[0-9]{4}"  maxlength="4" required></p>
                    
                    <big><p><label for="PrazoEntrega">Prazo de Entrega: </label></big>
                    <input type="date" min="2000-01-01"   name= 'PrazoEntrega' id="PrazoEntrega"  class="efeitos" required></p>

                    <input class="enviar" style="color:white" type="submit" value="Proximo">
                    <input class="enviar" style="color:white" type="reset" value="Limpar">
                    <h2 class="botao" style="color:white"><a href="logout.php">Sair<a/></h2> 
    

                    <br>
                    <cite><p style="color: LightGrey ">©WRW Despachantes 2023</p></cite>
                    
                   </form>
                </fieldset>
         </section>
    </body>
</html>