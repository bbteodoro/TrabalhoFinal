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

    $nomeProjeto = $_POST['nome_projeto'];
    $gerenteProjeto = $_POST['gerente_projeto'];
    $montadora = $_POST['montadora'];
    $responsavelMontadora = $_POST['responsavel_montadora'];
    $emailMontadora = $_POST['email_montadora'];
	$telefoneMontadora = $_POST['telefone_montadora'];
	$partNumberOem = $_POST['part_number_oem'];
    $partNumberFundido = $_POST['part_number_fundido'];
	$partNumberUsinado = $_POST['part_number_usinado'];

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
        $q->execute(array($nomeLivraria, $endereco, $telefone, $site, $logo));
        Banco::desconectar();
        header("Location: index.php");
    }
} 
// else {
//     $pdo = Banco::conectar();
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $sql = 'SELECT p.id, p.nome_projeto, p.gerente_projeto, p.id_montadora, p.responsavel_montadora, p.email_montadora, p.telefone_montadora, p.part_number_oem, p.part_number_usinado, p.part_number_fundido, m.nome AS nome_montadora FROM projeto p LEFT JOIN montadora m ON(p.id_montadora = m.id) WHERE p.id = ? ORDER BY p.id ASC';
//     $q = $pdo->prepare($sql);
//     $q->execute(array($id));
//     $data = $q->fetch(PDO::FETCH_ASSOC);
	
// 	$nomeProjeto = $data['nome_projeto'];
//     $gerenteProjeto = $data['gerente_projeto'];
//     $montadora = $data['id_montadora'];
//     $responsavelMontadora = $data['responsavel_montadora'];
//     $emailMontadora = $data['email_montadora'];
// 	$telefoneMontadora = $data['telefone_montadora'];
// 	$partNumberOem = $data['part_number_oem'];
//     $partNumberFundido = $data['part_number_fundido'];
// 	$partNumberUsinado = $data['part_number_usinado'];
// }
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
                <form class="form-horizontal" action="create.php" method="post">

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
                                   value="<?php echo !empty($endereco) ? $endereco : ''; ?>">
                            <?php if (!empty($enderecoLivrariaErro)): ?>
                                <span class="text-danger"><?php echo $enderecoLivrariaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="control-group <?php echo !empty($telefoneLivrariaErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Telefone livraria*</label>
                        <div class="controls">
                            <input size="100" class="form-control" name="Telefone" type="text" placeholder="Telefone"
                                   value="<?php echo !empty($telefone) ? $telefone : ''; ?>">
                            <?php if (!empty($telefoneLivrariaErro)): ?>
                                <span class="text-danger"><?php echo $telefoneLivrariaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

					
                    <div class="control-group <?php !empty($siteLivrariaErro) ? '$siteLivrariaErro ' : ''; ?>">
                        <label class="control-label">Site livraria*</label>
                        <div class="controls">
                            <input size="100" class="form-control" name="Site" type="text" placeholder="Site"
                                   value="<?php echo !empty($site) ? $site : ''; ?>">
                            <?php if (!empty($siteLivrariaErro)): ?>
                                <span class="text-danger"><?php echo $siteLivrariaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="control-group <?php !empty($logoLivrariaErro) ? '$logoLivrariaErro ' : ''; ?>">
                        <label class="control-label">Logo livraria*</label>
                        <div class="controls">
                            <input size="100" class="form-control" name="Logo" type="text" placeholder="Logo"
                                   value="<?php echo !empty($logo) ? $logo : ''; ?>">
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
                        <button type="submit" class="btn btn-success">Adicionar</button>
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