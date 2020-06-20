<?php
require 'banco.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM usuario where id = ?";
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Informações do Cliente</title>
</head>

<body>
<div class="container">
    <div class="span15 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well">Informações do Cliente</h3>
            </div>
            <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls form-control">
                            <label class="carousel-inner">
                                <?php echo $data['USER_NOME']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tipo</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['USER_TIPO']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Deficiência</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['USER_DEFICIENCIA']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Idade</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['USER_IDADE']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Rua</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['RUA']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Bairro</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['BAIRRO']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Cidade</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['CIDADE']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">UF</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['UF']; ?>
                            </label>
                        </div>
                    </div>
                    <br/>
                    <div class="form-actions">
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </div>
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
