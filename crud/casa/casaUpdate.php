<?php

require './../banco.php';

$id = null;
if (!empty($_GET['house_id'])) {
    $id = $_REQUEST['house_id'];
}

if (null == $id) {
    header("Location: casa.php");
}

if (!empty($_POST)) {

    $descricaoErro = null;

    $descricao = $_POST['houseDescription'];

    //Validação
 $validacao = true;
 if (empty($descricao)) {
    $descricaoErro = 'Por favor digite o nome!';
    $validacao = false;
 }

     // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE casa  set houseDescription = ? WHERE house_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($descricao, $id));
        Banco::desconectar();
        header("Location: casa.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM casa where house_id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $descricao = $data['houseDescription'];
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

    <title>Atualizar Casa</title>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Atualizar Casa </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="casaUpdate.php?house_id=<?php echo $id ?>" method="post">

                    <div class="control-group  <?php  echo !empty($descricaoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Descrição</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="houseDescription" type="text" placeholder="Descrição"
                                   value="<?php echo !empty($descricao) ? $descricao : ''; ?>">
                            <?php if (!empty($descricaoErro)): ?>
                                <span class="text-danger"><?php echo $descricaoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="casa.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once("./../partials/footer.php"); ?>