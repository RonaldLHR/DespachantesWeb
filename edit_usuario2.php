<?php
session_start();
$metodo = $_SERVER['REQUEST_METHOD'];
include_once("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <title>Edição de Aluno</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">

    <h2>Editar de Aluno - Código <?php echo "$metodo"; ?></h2>
<?php
$update_query = "UPDATE Usuarios 
SET nome = '$_POST[nome]', 
email = '$_POST[email]'
WHERE codigo = $_POST[codigo]";

if (!empty($_POST)) {    
    if(mysqli_query($mysqli, $update_query)){
        echo '<div class="alert alert-success" role="alert">
        Usuarios '.$_POST['codigo'].' atualizado com sucesso!
      </div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">
            Erro ao atualizar o aluno '.$_POST['codigo'].'!
          </div>';

    }
}
?>
    <form method="post" action="edit_aluno2.php" enctype="multipart/form-data">
   <!-- Imprimindo inputs -->
   <?php
   if ($metodo == 'GET') {
    // GET
    $codigo = $_GET['codigo'];
        $query = "SELECT * FROM Usuarios WHERE codigo = $codigo";
        $usuarios = mysqli_fetch_assoc(mysqli_query($mysqli, $query));
        if (!empty($usuarios)) {
            //$codigo = $usuarios['codigo'];
            $nome = $usuarios['nome'];
            $email = $usuarios['email'];
        }else{
            echo '<div class="alert alert-danger" role="alert">
            Usuarios '.$codigo.' não encontrado!
          </div>';
        }
    }
   ?>
   <div class="form-group">
    <label for="codigo">Código:</label>
    <input
      type="number"
      class="form-control"
      id="codigo"
      name="codigo"
      value="<?php echo "$codigo"?>"
      readonly/>
  </div>
    <div class="form-group">
    <label for="nome">Nome:</label>
    <input
      type="nome"
      class="form-control"
      id="nome"
      placeholder="Nome Completo"
      name="nome"
      value="<?php echo "$nome"?>"/>
  </div>
  <div class="form-group">
    <label for="email">email:</label>
    <input
      type="email"
      class="form-control"
      id="email"
      placeholder="email"
      name="email"
      value="<?php echo "$email"?>"/>
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <button type="reset" class="btn btn-default">Limpar</button>
    </form>
    </div>
    </body>
  </html>