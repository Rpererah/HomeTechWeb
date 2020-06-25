<?php
require './../banco.php';
$id = null;
if (!empty($_GET['comp_id'])) {
    $id = $_REQUEST['comp_id'];
}

if (null == $id) {
    header("Location:componente.php");
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM componente where comp_id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <title>Informações do Componente</title>
</head>

<body>
<div class="container">
    <div class="span15 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well">Informações dos Componentes</h3>
            </div>
            <div class="container">
            <div class="control-group">
                        <label class="control-label">house_id</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['house_id']; ?>
                            </label>
                        </div>
                    </div>

            
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls form-control">
                            <label class="carousel-inner">
                                <?php echo $data['compName']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Descrição</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['compDescription']; ?>
                            </label>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <a href="componente.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("./../partials/footer.php"); ?>