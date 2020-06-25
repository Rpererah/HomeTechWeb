<?php
require './../banco.php';
$pdo = Banco::conectar();
$sql = 'SELECT * FROM usuario ORDER BY user_id ASC';



//Acompanha os erros de validação

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $houseErro = null;
    $nomeErro = null;
    $descricaoErro = null;
    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['compName'])) {
            $nome = $_POST['compName'];
        } else {
            $nomeErro = 'Por favor digite o nome do componente!';
            $validacao = False;
        }

        if (!empty($_POST['compDescription'])) {
            $descricao = $_POST['compDescription'];
        } else {
            $descricaoErro = 'Por favor digite a sua descrição!';
            $validacao = False;
        }
        if (!empty($_POST['house_id'])) {
            $house = $_POST['house_id'];
        } else {
            $houseErro = 'Por favor o id correto House!';
            $validacao = False;
        }
    }

//Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO componente (compName, compDescription,house_id) VALUES(?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $descricao, $house));
        Banco::desconectar();
        header("Location: componente.php");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <title>Adicionar Componente</title>
</head>

<body>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Componente </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="createComponente.php" method="post">

                    <div class="control-group  <?php echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Nome do Componente</label>
                        <div class="controls">
                        <select id="compName" class="form-control" name="compName" type="text" placeholder="compName"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <option value="Arduino">Arduino</option>
                            <option value="LED">LED</option>
                            <option value="Lâmpada">Lâmpada</option>
                            <option value="SmartTomada">SmartTomada</option>
                        </select>
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($descricaoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Descrição</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="compDescription" type="text" placeholder="Descrição"
                                   value="<?php echo !empty($descricao) ? $descricao : ''; ?>">
                            <?php if (!empty($descricaoErro)): ?>
                                <span class="text-danger"><?php echo $descricaoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($houseErro) ? 'error ' : ''; ?>">
                        <label class="control-label">House ID</label>
                        <div class="controls">
                            <select class="form-control" name="house_id" type="text" placeholder="House ID"
                                   value="<?php echo !empty($house) ? $house : ''; ?>">
                                   <?php  
                                    foreach($pdo->query($sql)as $row){
                                    echo '<option value="'.$row['user_id'].'">'.$row['user_id'].' - '. $row['userName'].'</option>';
                                    }
                                   ?>
                            </select>
                            <?php if (!empty($houseErro)): ?>
                                <span class="text-danger"><?php echo $houseErro; ?></span>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                   
                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="componente.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php include_once("./../partials/footer.php"); ?>