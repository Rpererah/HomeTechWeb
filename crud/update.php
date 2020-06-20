<?php

require 'banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {

    $nomeErro = null;
    $tipoErro = null;
    $deficienciaErro = null;
    $idadeErro = null;
    $ruaErro = null;
    $bairroErro = null;
    $cidadeErro = null;
    $ufErro = null;

    $nome = $_POST['USER_NOME'];
    $tipo = $_POST['USER_TIPO'];
    $deficiencia = $_POST['USER_DEFICIENCIA'];
    $idade = $_POST['USER_IDADE'];
    $rua = $_POST['RUA'];
    $bairro = $_POST['BAIRRO'];
    $cidade = $_POST['CIDADE'];
    $uf = $_POST['UF'];

    //Validação
 $validacao = true;
 if (empty($nome)) {
    $nomeErro = 'Por favor digite o nome!';
    $validacao = false;
 }

 if (empty($tipo)) {
     $tipoErro = 'Por favor digite o endereço!';
     $validacao = false;
}

if (empty($deficiencia)) {
       $deficienciaErro = 'Por favor preenche o campo!';
      $validacao = false;
 }
 if (empty($idade)) {
    $idadeErro = 'Por favor preenche o campo!';
   $validacao = false;
}
if (empty($rua)) {
    $ruaErro = 'Por favor preenche o campo!';
   $validacao = false;
}
if (empty($bairro)) {
    $bairroErro = 'Por favor preenche o campo!';
   $validacao = false;
}
if (empty($cidade)) {
    $cidadeErro = 'Por favor preenche o campo!';
   $validacao = false;
}
if (empty($uf)) {
    $ufErro = 'Por favor preenche o campo!';
   $validacao = false;
}


    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE usuario  set USER_NOME = ?, USER_TIPO = ?, USER_DEFICIENCIA = ?, USER_IDADE = ?, RUA = ?, BAIRRO = ?, CIDADE = ?, UF = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $tipo, $deficiencia,$idade,$rua,$bairro,$cidade,$uf, $id));
        Banco::desconectar();
        header("Location: index.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM usuario where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['USER_NOME'];
    $tipo = $data['USER_TIPO'];
    $deficiencia = $data['USER_DEFICIENCIA'];
    $idade = $data['USER_IDADE'];
    $rua = $data['RUA'];
    $bairro = $data['BAIRRO'];
    $cidade = $data['CIDADE'];
    $uf = $data['UF'];
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
                <form class="form-horizontal" action="update.php?id=<?php echo $id ?>" method="post">

                <div class="control-group  <?php  echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="USER_NOME" type="text" placeholder="Nome"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($tipoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">tipo</label>
                        <div class="controls">
                            <input size="80" class="form-control" name="USER_TIPO" type="number" placeholder="Tipo"
                                   value="<?php echo !empty($tipo) ? $tipo : ''; ?>">
                            <?php if (!empty($tipoErro)): ?>
                                <span class="text-danger"><?php echo $tipoErro; ?></span> -->
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($deficienciaErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Deficiência</label>
                        <div class="controls">
                            <input size="80" class="form-control" name="USER_DEFICIENCIA" type="text" placeholder="Deficiência"
                                   value="<?php echo !empty($deficiencia) ? $deficiencia : ''; ?>">
                            <?php if (!empty($deficienciaErro)): ?>
                                <span class="text-danger"><?php echo $deficienciaErro; ?></span> -->
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($idadeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Idade</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="USER_IDADE" type="number" placeholder="Idade"
                                   value="<?php echo !empty($idade) ? $idade : ''; ?>">
                            <?php if (!empty($idadeErro)): ?>
                                <span class="text-danger"><?php echo $idadeErro; ?></span> 
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($ruaErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Rua</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="RUA" type="text" placeholder="Rua"
                                   value="<?php echo !empty($rua) ? $rua : ''; ?>">
                            <?php if (!empty($ruaErro)): ?>
                                <span class="text-danger"><?php// echo $ruaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($bairroErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Bairro</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="BAIRRO" type="text" placeholder="Bairro"
                                   value="<?php echo !empty($bairro) ? $bairro : ''; ?>">
                            <?php if (!empty($ruaErro)): ?>
                                 <span class="text-danger"><?php echo $bairroErro; ?></span> 
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($cidadeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Cidade</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="CIDADE" type="text" placeholder="Cidade"
                                   value="<?php echo !empty($cidade) ? $cidade : ''; ?>">
                            <?php if (!empty($cidadeErro)): ?>
                                <span class="text-danger"><?php echo $cidadeErro; ?></span> 
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <? !empty($ufErro) ? 'error ' : ''; ?>">
                        <label class="control-label">UF</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="UF" type="text" placeholder="UF"
                                   value="<?php echo !empty($uf) ? $uf : ''; ?>">
                            <?php if (!empty($ufErro)): ?>
                                <span class="text-danger"><?php echo $ufErro; ?></span> 
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
