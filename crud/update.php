<?php

require 'banco.php';

$id = null;
if (!empty($_GET['user_id'])) {
    $id = $_REQUEST['user_id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {

    $nomeErro = null;
    $emailErro = null;
    $telefoneErro = null;
    $deficienciaErro = null;
    $idadeErro = null;
    $enderecoErro = null;

    $nome = $_POST['userName'];
    $email = $_POST['userEmail'];
    $telefone = $_POST['userPhone'];
    $tipo = $_POST['userType'];
    $deficiencia = $_POST['userDeficiency'];
    $idade = $_POST['userAge'];
    $endereco = $_POST['userAddress'];

    //Validação
 $validacao = true;
 if (empty($nome)) {
    $nomeErro = 'Por favor digite o nome!';
    $validacao = false;
 }

 if (empty($email)) {
     $emailErro = 'Por favor digite o endereço!';
     $validacao = false;
}

if (empty($telefone)) {
       $telefoneErro = 'Por favor preenche o campo!';
      $validacao = false;
 }
if (empty($deficiencia)) {
    $deficienciaErro = 'Por favor preenche o campo!';
   $validacao = false;
}
if (empty($idade)) {
    $endereco = 'Por favor preenche o campo!';
   $validacao = false;
}
if (empty($endereco)) {
    $enderecoErro = 'Por favor preenche o campo!';
   $validacao = false;
}


    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE usuario  set userName = ?, userEmail = ?, userPhone = ?, userType = ?, userDeficiency = ?, userAge = ?, userAddress = ? WHERE user_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $email, $telefone,$tipo,$deficiencia,$idade,$endereco, $id));
        Banco::desconectar();
        header("Location: index.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM usuario where user_id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['userName'];
    $email = $data['userEmail'];
    $telefone = $data['userPhone'];
    $tipo = $data['userType'];
    $deficiencia = $data['userDeficiency'];
    $idade = $data['userAge'];
    $endereco = $data['userAddress'];
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- using new bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Atualizar Contato</title>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Atualizar Contato </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="update.php?user_id=<?php echo $id ?>" method="post">

                <div class="control-group  <?php  echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="userName" type="text" placeholder="Nome"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($emailErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="userEmail" type="text" placeholder="Email"
                                   value="<?php echo !empty($email) ? $email : ''; ?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="text-danger"><?php echo $emailErro; ?></span> 
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <? !empty($telefoneErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="userPhone" type="text" placeholder="Telefone"
                                   value="<?php echo !empty($telefone) ? $telefone : ''; ?>">
                            <?php if (!empty($telefoneErro)): ?>
                                <span class="text-danger"><?php echo $telefoneErro; ?></span> 
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($tipoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Tipo</label>
                        <div class="controls">
                        <select id="tipo" class="form-control" name="userType" type="text" placeholder="Tipo"
                                   value="<?php echo !empty($tipo) ? $tipo : ''; ?>">
                                   <?php if($data['userType']==0 || $data['userType']==null ){
                                    echo '<option value="0">Usuário Comum</option>
                                          <option value="1">Administrador</option>';
                                } else{
                                    echo '<option value="1">Administrador</option>
                                          <option value="0">Usuário Comum</option>';
                                } 
                                 ?>
                        </select>
                            <?php if (!empty($tipoErro)): ?>
                                <span class="text-danger"><?php echo $tipoErro; ?></span> -->
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($deficienciaErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Deficiência</label>
                        <div class="controls">
                        <select id="deficiencia" class="form-control" name="userDeficiency" type="text" placeholder="Deficiência"
                                   value="<?php echo !empty($deficiencia) ? $deficiencia : ''; ?>">
                            <option value="nenhuma">Nenhuma</option>
                            <option value="auditiva">Auditiva</option>
                            <option value="visual">Visual</option>
                            <option value="outra">Outra</option>
                        </select>
                            <?php if (!empty($deficienciaErro)): ?>
                                <span class="text-danger"><?php echo $deficienciaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($idadeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Idade</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="userAge" type="number" placeholder="Idade"
                                   value="<?php echo !empty($idade) ? $idade : ''; ?>">
                            <?php if (!empty($idadeErro)): ?>
                                <span class="text-danger"><?php echo $idadeErro; ?></span> 
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($enderecoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Endereço Completo</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="userAddress" type="text" placeholder="Endereço"
                                   value="<?php echo !empty($endereco) ? $endereco : ''; ?>">
                            <?php if (!empty($enderecoErro)): ?>
                                <span class="text-danger"><?php echo $enderecoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>