<?php
require './../banco.php';
$pdo = Banco::conectar();
$sql = 'SELECT * FROM usuario ORDER BY user_id ASC';
//Acompanha os erros de validação

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_idErro = null;
    $descricaoErro = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;

        if (!empty($_POST['user_id'])) {
            $user_id = $_POST['user_id'];
        } else {
            $user_idErro = 'Por favor digite um id válido';
            $validacao = False;
        }

        if (!empty($_POST['houseDescription'])) {
            $descricao = $_POST['houseDescription'];
        } else {
            $descricaoErro = 'Por favor digite uma descrição';
            $validacao = False;
        }
       
    }

//Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO casa (user_id, houseDescription) VALUES(?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($user_id, $descricao));
        Banco::desconectar();
        header("Location: casa.php");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <title>Adicionar Casa</title>
</head>

<body>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Casa </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="casaCreate.php" method="post">

                    <div class="control-group  <?php echo !empty($user_idErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Id do Usuário</label>
                        <div class="controls">
                        <select class="form-control" name="user_id" type="text" placeholder="User ID"
                            value="<?php echo !empty($user_id) ? $user_id : ''; ?>">
                                <?php  
                                 foreach($pdo->query($sql)as $row){
                                 echo '<option value="'.$row['user_id'].'">'.$row['user_id'].' - '. $row['userName'].'</option>';
                                 }
                                ?>
                        </select>
                            <?php if (!empty($user_idErro)): ?>
                                <span class="text-danger"><?php echo $user_idErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="control-group  <?php echo !empty($descricaoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Descrição</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="houseDescription" type="text" placeholder="Descrição"
                                   value="<?php echo !empty($descricao) ? $descricao : ''; ?>">
                            <?php if (!empty($descricaoErro)): ?>
                                <span class="text-danger"><?php echo $descricaoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="casa.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php include_once("./../partials/footer.php"); ?>