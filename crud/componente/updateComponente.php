<?php

require './../banco.php';

$id = null;
if (!empty($_GET['comp_id'])) {
    $id = $_REQUEST['comp_id'];
}

if (null == $id) {
    header("Location: componente.php");
}

if (!empty($_POST)) {

    $nomeErro = null;
    $DescricaoErro = null;

    $nome = $_POST['compName'];
    $descricao = $_POST['compDescription'];

    //Validação
 $validacao = true;
 if (empty($nome)) {
    $nomeErro = 'Por favor digite o nome!';
    $validacao = false;
 }

 if (empty($descricao)) {
     $DescricaoErro = 'Por favor digite a descrição!';
     $validacao = false;
}

    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE componente  set compName = ?, compDescription = ? WHERE comp_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $descricao, $id));
        Banco::desconectar();
        header("Location: componente.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM componente where comp_id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['compName'];
    $descricao = $data['compDescription'];

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

    <title>Atualizar Componente</title>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Atualizar Componente </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="updateComponente.php?comp_id=<?php echo $id ?>" method="post">

                <div class="control-group  <?php  echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                        <select id="compName" class="form-control" name="compName" type="text" placeholder="compName"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                                   <?php if($data['compName']=='Arduino' || $data['compName']=='arduino'){
                                    echo '<option selected value="Arduino">Arduino</option>
                                          <option value="LED">LED</option>
                                          <option value="Lâmpada">Lâmpada</option>
                                          <option value="SmartTomada">SmartTomada</option>';
                                } elseif($data['compName']=='LED'){
                                    echo '<option value="Arduino">Arduino</option>
                                          <option selected value="LED">LED</option>
                                          <option value="Lâmpada">Lâmpada</option>
                                          <option value="SmartTomada">SmartTomada</option>';
                                } elseif($data['compName']=='Lâmpada'){
                                    echo '<option value="Arduino">Arduino</option>
                                          <option value="LED">LED</option>
                                          <option selected value="Lâmpada">Lâmpada</option>
                                          <option value="SmartTomada">SmartTomada</option>';
                                } elseif($data['compName']=='SmartTomada'){
                                    echo '<option value="Arduino">Arduino</option>
                                          <option value="LED">LED</option>
                                          <option value="Lâmpada">Lâmpada</option>
                                          <option selected value="SmartTomada">SmartTomada</option>';
                                }
                                 ?>
                        </select>
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($DescricaoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Descrição</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="compDescription" type="text" placeholder="Descrição"
                                   value="<?php echo !empty($descricao) ? $descricao : ''; ?>">
                            <?php if (!empty($DescricaoErro)): ?>
                                <span class="text-danger"><?php echo $DescricaoErro; ?></span> 
                            <?php endif; ?>
                        </div>
                    </div>
                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="componente.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once("./../partials/footer.php"); ?>