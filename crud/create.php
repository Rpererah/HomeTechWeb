

<?php
require 'banco.php';
//Acompanha os erros de validação

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeErro = null;
    $EmailErro = null;
    $TelefoneErro = null;
    $deficienciaErro = null;
    $idadeErro = null;
    $EnderecoErro = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['userName'])) {
            $nome = $_POST['userName'];
        } else {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = False;
        }

        if (!empty($_POST['userEmail'])) {
            $email = $_POST['userEmail'];
            if (!filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL)) {
                $emailErro = 'Por favor digite um endereço de email válido!';
                $validacao = False;
            }
        } else {
            $emailErro = 'Por favor digite um endereço de email!';
            $validacao = False;
        }

        if (!empty($_POST['userPhone'])) {
            $telefone = $_POST['userPhone'];
        } else {
            $TelefoneErro = 'Por favor digite o seu telefone!';
            $validacao = False;
        }

        if (!empty($_POST['userDeficiency'])) {
            $deficiencia = $_POST['userDeficiency'];
        } else {
            $deficienciaErro = 'Por favor digite a sua deficiencia ou coloque nenhuma';
            $validacao = False;
        }

        if (!empty($_POST['userAge'])) {
            $idade = $_POST['userAge'];
        } else {
            $idadeErro = 'Por favor digite a sua idade!';
            $validacao = False;
        }

        if (!empty($_POST['userAddress'])) {
            $endereco = $_POST['userAddress'];
        } else {
            $EnderecoErro = 'Por favor digite o seu endereço completo!';
            $validacao = False;
        }
    }

//Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO usuario (userName, userEmail, userPhone, userType, userDeficiency,userAge,userAddress) VALUES(?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $email, $telefone, $tipo, $deficiencia, $idade, $endereco));
        Banco::desconectar();
        header("Location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Adicionar Contato</title>
</head>

<body>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Contato </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="create.php" method="post">

                    <div class="control-group  <?php echo !empty($nomeErro) ? 'error ' : ''; ?>">
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

                    <div class="control-group <?php !empty($TelefoneErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="userPhone" type="text" placeholder="Telefone"
                                   value="<?php echo !empty($telefone) ? $telefone : ''; ?>">
                            <?php if (!empty($TelefoneErro)): ?>
                                <span class="text-danger"><?php echo $TelefoneErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls">
                            <input size="35" class="form-control" name="userType" type="hidden" placeholder="Tipo" value="0">
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

                    <div class="control-group <?php !empty($EnderecoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Endereço Completo</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="userAddress" type="text" placeholder="Endereço"
                                   value="<?php echo !empty($endereco) ? $endereco : ''; ?>">
                            <?php if (!empty($EnderecoErro)): ?>
                                <span class="text-danger"><?php echo $EnderecoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    

                    
                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
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

