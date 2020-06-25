<?php
require './../banco.php';

$id = 0;

if(!empty($_GET['house_id']))
{
    $id = $_REQUEST['house_id'];
}

if(!empty($_POST))
{
    $id = $_POST['house_id'];

    //Delete do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM casa where house_id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Banco::desconectar();
    header("Location: casa.php");
}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
        <title>Deletar Casa</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well">Excluir Casa</h3>
                </div>
                <form class="form-horizontal" action="casaDelete.php" method="post">
                    <input type="hidden" name="house_id" value="<?php echo $id;?>" />
                    <div class="alert alert-danger"> Deseja excluir a casa?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="casa.php" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>
        </div>

<?php include_once("./../partials/footer.php"); ?>