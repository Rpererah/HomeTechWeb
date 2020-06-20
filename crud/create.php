

<?php
require 'banco.php';
//Acompanha os erros de validação

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeErro = null;
    $tipoErro = null;
    $deficienciaErro = null;
    $idadeErro = null;
    $ruaErro = null;
    $bairroErro = null;
    $cidadeErro = null;
    $ufErro = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['USER_NOME'])) {
            $nome = $_POST['USER_NOME'];
        } else {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = False;
        }

            $tipo = $_POST['USER_TIPO'];

        if (!empty($_POST['USER_DEFICIENCIA'])) {
            $deficiencia = $_POST['USER_DEFICIENCIA'];
        } else {
            $deficienciaErro = 'Por favor digite a sua deficiencia!';
            $validacao = False;
        }

        if (!empty($_POST['USER_IDADE'])) {
            $idade = $_POST['USER_IDADE'];
        } else {
            $idadeErro = 'Por favor digite a sua idade!';
            $validacao = False;
        }

        if (!empty($_POST['RUA'])) {
            $rua = $_POST['RUA'];
        } else {
            $ruaErro = 'Por favor digite a sua rua!';
            $validacao = False;
        }

        if (!empty($_POST['BAIRRO'])) {
            $bairro = $_POST['BAIRRO'];
        } else {
            $bairroErro = 'Por favor digite o seu bairro!';
            $validacao = False;
        }

        if (!empty($_POST['CIDADE'])) {
            $cidade = $_POST['CIDADE'];
        } else {
            $cidadeErro = 'Por favor digite a sua cidade!';
            $validacao = False;
        }

        if (!empty($_POST['UF'])) {
            $uf = $_POST['UF'];
        } else {
            $ufErro = 'Por favor digite a abreviação do seu estado!';
            $validacao = False;
        }
    }

//Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO usuario (USER_NOME, USER_TIPO, USER_DEFICIENCIA, USER_IDADE, RUA, BAIRRO, CIDADE, UF) VALUES(?,?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $tipo, $deficiencia, $idade, $rua, $bairro, $cidade, $uf));
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
                            <input size="50" class="form-control" name="USER_NOME" type="text" placeholder="Nome"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls">
                            <input size="35" class="form-control" name="USER_TIPO" type="hidden" placeholder="Tipo"
                                   value="<?php echo !empty($tipo) ? $tipo : 0; ?>">
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($deficienciaErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Deficiência</label>
                        <div class="controls">
                            <input size="80" class="form-control" name="USER_DEFICIENCIA" type="text" placeholder="Deficiência"
                                   value="<?php echo !empty($deficiencia) ? $deficiencia : ''; ?>">
                            <?php if (!empty($deficienciaErro)): ?>
                                <span class="text-danger"><?php echo $deficienciaErro; ?></span>
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
                                <span class="text-danger"><?php echo $ruaErro; ?></span>
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

                    <div class="control-group <?php !empty($ufErro) ? 'error ' : ''; ?>">
                        <label class="control-label">UF</label>
                        <div class="controls">
                            <input size="40"  class="form-control" name="UF" type="text" placeholder="UF" maxlength="2"
                                   value="<?php echo !empty($uf) ? $uf : ''; ?>">
                            <?php if (!empty($ufErro)): ?>
                                <span class="text-danger"><?php echo $ufErro; ?></span>
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

