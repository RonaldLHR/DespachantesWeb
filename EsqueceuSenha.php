<?php
$erro = Array();

include("conexao.php");

if(isset($_POST['ok'])){

    $email = $mysqli->escape_string($_POST['email']);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erro[] = "E-mail inválido.";
    }

    $sql_code = "SELECT senha, codigo FROM usuarios WHERE email = '$email'";
	$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
    $dado = $sql_query->fetch_assoc();
    $total = $sql_query->num_rows;

    if($total == 0)
       $erro[] = "O e-mail informado não existe no banco de dados.";

    if(count($erro) ==0 && $total > 0){

    
    
    $novasenha = substr(md5(time()), 0, 8); 
    $nscriptografada =md5(md5($novasenha));
 
   if(mail($email, "Sua nova senha", "Sua Nova senha:" .$novasenha)){
    $sql_code = "UPDATE usuarios SET senha = '$nscriptografada' WHERE email = '$email'";
    $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
    
    if($sql_query)
       $erro[] = "Senha Alterada com Sucesso!";

           }

        }
    } 

?>
<html>
<head>
    <title>Esqueceu Senha</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/LoginDespachante.css">
</head>
<body>
    <?php if(count($erro) > 0)
            foreach($erro as $msg){
                echo "<p>$msg</p>";
            }


    ?>
      <div class="div">
      <u><h1 style="color:black" class="efeitos2">Troca de Senha</h1></u>
      <section class="center">
      <form  method="POST" action="">
      <p><img src=http://www.pr.gov.br/logos/assinatura_expresso/2019/logo-v-detran-400x200.jpg
        title="Imagem retirada de http://www.pr.gov.br/logos/assinatura_expresso/2019/"/></p>
        
        <big><p><label class="efeitos" style="color: white" for="Email">Digite seu Email:</label></big> 
      <input placeholder="Seu e-mail" name="email" type="text">
      <input name="ok" value="ok" type="submit">
  

        </selecion>
     </form>
   </body>
</html>


