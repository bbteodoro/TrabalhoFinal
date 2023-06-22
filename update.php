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

    $nomeLivrariaErro = null;
    $enderecoLivrariaErro = null;
    $siteLivrariaErro = null;
	$telefoneLivrariaErro = null;
    $logoLivrariaErro = null;

    $nomeLivraria = $_POST['Nome'];
    $enderecoLivraria = $_POST['Endereco'];
    $telefoneLivraria = $_POST['Telefone'];
    $siteLivraria = $_POST['Site'];
    $logoLivraria = $_POST['Logo'];


    //Validação
    $validacao = true;
	
    if (!empty($_POST['Nome'])) {
        $nomeLivraria = $_POST['Nome'];
    } else {
        $nomeLivrariaErro = 'Por favor digite o nome da livraria!';
        $validacao = False;
    }


    if (!empty($_POST['Endereco'])) {
        $endereco = $_POST['Endereco'];
    } else {
        $enderecoLivrariaErro = 'Por favor digite o endereço da livraria!';
        $validacao = False;
    }
    

    if (!empty($_POST['Telefone'])) {
        $telefone = $_POST['Telefone'];
    } else {
        $telefoneLivrariaErro = 'Por favor digite o telefone da livraria!';
        $validacao = False;
    }


    if (!empty($_POST['Site'])) {
        $site = $_POST['Site'];
    } else {
        $siteLivrariaErro = 'Por favor digite o link do site!';
        $validacao = False;
    }


    if (!empty($_POST['Logo'])) {
        $logo = $_POST['Logo'];
    } else {
        $logoLivrariaErro = 'Por favor digite o link da logo!';
        $validacao = False;
    }

    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE livrarias set Nome = ?, Endereco = ?, Telefone = ?, Site = ?, Logo = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nomeLivraria, $enderecoLivraria, $telefoneLivraria, $siteLivraria, $logoLivraria, $id));
        Banco::desconectar();
        header("Location: index.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT Nome, Endereco, Telefone, Site, Logo FROM livrarias WHERE id = ? ORDER BY id ASC';
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
	
    $nomeLivraria = $data['Nome'];
    $enderecoLivraria = $data['Endereco'];
    $telefoneLivraria = $data['Telefone'];
    $siteLivraria = $data['Site'];
    $logoLivraria = $data['Logo'];
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

    <title>Atualizar Projeto</title>
</head>

<body>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Atualizar Livraria </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="update.php?id=<?php echo $id ?>" method="post">

                    <div class="control-group  <?php echo !empty($nomeLivrariaErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Nome livraria*</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="Nome" type="text" placeholder="Nome"
                                   value="<?php echo !empty($nomeLivraria) ? $nomeLivraria : ''; ?>">
                            <?php if (!empty($nomeLivrariaErro)): ?>
                                <span class="text-danger"><?php echo $nomeLivrariaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="control-group <?php echo !empty($enderecoLivrariaErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Endereço livraria*</label>
                        <div class="controls">
                            <input size="100" class="form-control" name="Endereco" type="text" placeholder="Endereço"
                                   value="<?php echo !empty($enderecoLivraria) ? $enderecoLivraria : ''; ?>">
                            <?php if (!empty($enderecoLivrariaErro)): ?>
                                <span class="text-danger"><?php echo $enderecoLivrariaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="control-group <?php echo !empty($telefoneLivrariaErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Telefone livraria*</label>
                        <div class="controls">
                            <input size="100" class="form-control" name="Telefone" type="text" placeholder="Telefone"
                                   value="<?php echo !empty($telefoneLivraria) ? $telefoneLivraria : ''; ?>">
                            <?php if (!empty($telefoneLivrariaErro)): ?>
                                <span class="text-danger"><?php echo $telefoneLivrariaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

					
                    <div class="control-group <?php !empty($siteLivrariaErro) ? '$siteLivrariaErro ' : ''; ?>">
                        <label class="control-label">Site livraria*</label>
                        <div class="controls">
                            <input size="100" class="form-control" name="Site" type="text" placeholder="Site"
                                   value="<?php echo !empty($siteLivraria) ? $siteLivraria : ''; ?>">
                            <?php if (!empty($siteLivrariaErro)): ?>
                                <span class="text-danger"><?php echo $siteLivrariaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="control-group <?php !empty($logoLivrariaErro) ? '$logoLivrariaErro ' : ''; ?>">
                        <label class="control-label">Logo livraria*</label>
                        <div class="controls">
                            <input size="100" class="form-control" name="Logo" type="text" placeholder="Logo"
                                   value="<?php echo !empty($logoLivraria) ? $logoLivraria : ''; ?>">
                            <?php if (!empty($logoLivrariaErro)): ?>
                                <span class="text-danger"><?php echo $logoLivrariaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>


					<!-- <div class="control-group <?php !empty($telefoneLivrariaErro) ? '$telefoneLivrariaErro ' : ''; ?>">
                        <label class="control-label">Telefone livraria*</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="Telefone" type="text" placeholder="Telefone"
                                   value="<?php echo !empty($telefoneLivraria) ? $telefoneLivraria : ''; ?>">
                            <?php if (!empty($telefoneLivrariaErro)): ?>
                                <span class="text-danger"><?php echo $telefoneLivrariaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div> -->
					
                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Atualizar</button>
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